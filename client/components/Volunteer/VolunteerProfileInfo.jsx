import React from 'react';
import Tab from 'react-bootstrap/Tab';
import Tabs from 'react-bootstrap/Tabs';
import Container from 'react-bootstrap/Container';
import Col from 'react-bootstrap/Col';
import Row from 'react-bootstrap/Row';
import Table from 'react-bootstrap/Table';
import VolunteerReviewCard from './VolunteerReviewCard';
import ListGroup from 'react-bootstrap/ListGroup';
import Badge from 'react-bootstrap/Badge';
import Carousel from 'react-bootstrap/Carousel';
import CarouselItem from 'react-bootstrap/CarouselItem';
import { connect } from 'react-redux';

import { getVolunteer } from '../../actions/volunteersActions';

class VolunteerProfileInfo extends React.Component {
  constructor(props) {
    super(props);
  }

  render() {
    const { volunteer } = this.props;

    return (
      <Container>
        <Row>
          <Col lg={12}>
            <Row>
              <h3>Aprašymas</h3>
              <p style={{ textAlign: 'justify' }}>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer
                tortor ante, scelerisque ac ultricies et, varius ut nisi. Orci
                varius natoque penatibus et magnis dis parturient montes,
                nascetur ridiculus mus. Proin sit amet fermentum massa. Nam
                eleifend justo erat, vel vestibulum sapien imperdiet et. Morbi
                justo nunc, elementum vel scelerisque.
              </p>
            </Row>
            <Row>
              <h3>Kontaktinė informacija</h3>
            </Row>
            <Row>
              <Table striped borderless hover>
                <tbody>
                  <tr>
                    <td>Tel. nr.</td>
                    <td>
                      <a href={`tel:${volunteer.phone}`}>{volunteer.phone}</a>
                    </td>
                  </tr>
                  <tr>
                    <td>El. paštas</td>
                    <td>
                      <a href={`mailto:${volunteer.email}`}>
                        {volunteer.email}
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>Miestas, Šalis</td>
                    <td> {`${volunteer.city}, ${volunteer.country}`}</td>
                  </tr>
                </tbody>
              </Table>
            </Row>
            <Row>
              <h3>Statistika</h3>
            </Row>
            <Row>
              <Table striped borderless hover>
                <tbody>
                  <tr>
                    <td>Reitingas</td>
                    <td>4.5/4 (36)</td>
                  </tr>
                  <tr>
                    <td>
                      <a href="#">Atsiliepimai</a>
                    </td>
                    <td>23</td>
                  </tr>
                  <tr>
                    <td>
                      <a href="#">Dalyvauta renginių</a>
                    </td>
                    <td> 9</td>
                  </tr>
                </tbody>
              </Table>
            </Row>
            <Row>
              {/* <Carousel>
                <Carousel.Item>
                  <VolunteerReviewCard />
                </Carousel.Item>
                <Carousel.Item>
                  <VolunteerReviewCard />
                </Carousel.Item>
                <Carousel.Item>
                  <VolunteerReviewCard />
                </Carousel.Item>
              </Carousel> */}

              {/* <VolunteerReviewCard /> */}
            </Row>
          </Col>
        </Row>
      </Container>
    );
  }
}

export default VolunteerProfileInfo;

{
  /* <Col lg={4} style={{ paddingLeft: '30px' }}>
<Row>
  <h3>Statistics</h3>
  <ListGroup>
    <ListGroup.Item>
      Rating <Badge variant="secondary">4.5/5</Badge>
    </ListGroup.Item>
    <ListGroup.Item>
      Reviews <Badge variant="secondary">6</Badge>
    </ListGroup.Item>
    <ListGroup.Item>
      Events attended <Badge variant="secondary">5</Badge>
    </ListGroup.Item>
  </ListGroup>
</Row>
<Row>
  <h3>Expierence</h3>
</Row>
</Col> */
}

{
  /* <Tabs defaultActiveKey="home" transition={false} id="noanim-tab-example">
<Tab eventKey="home" title="Profile">
  <Container className="profile-info-container">
    <Row>
      <h3>Full name</h3>
    </Row>
    <Row>
      <h4>
        {volunteer.firstname + ' ' + volunteer.lastname} <hr />
      </h4>
      <hr />
    </Row>
    <Row>
      <h3>About</h3>
    </Row>
    <Row>
      <p>
        {volunteer.description}
        <hr />
      </p>
    </Row>
    <Row>
      <h3>City, Country</h3>
    </Row>
    <Row>
      <h4>
        {volunteer.city + ', ' + volunteer.country}
        <hr />
      </h4>
    </Row>
    <Row>
      <h3>Phone</h3>
    </Row>
    <Row>
      <h4>
        {volunteer.phone} <hr />
      </h4>
    </Row>
    <Row>
      <h3>Email</h3>
    </Row>
    <Row>
      <h4>{volunteer.email}</h4>
    </Row>
  </Container>
</Tab>
<Tab eventKey="profile" title="Attended Events">
  {volunteer.events.map(event => (
    <h4>{event.title}</h4>
  ))}
</Tab>
<Tab eventKey="contact" title="Reviews">
  {volunteer.reviews.map(review => (
    <h4>{review.reviewBody}</h4>
  ))}
</Tab>
</Tabs> */
}

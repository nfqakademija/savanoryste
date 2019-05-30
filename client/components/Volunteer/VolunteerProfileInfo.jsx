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
import { Link } from 'react-router-dom';
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
            </Row>
            <Row>
              <p style={{ textAlign: 'justify' }}>{volunteer.description}</p>
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
                      <Link to={`/reviews/${volunteer.id}`}>Atsiliepimai</Link>
                    </td>
                    <td>23</td>
                  </tr>
                  <tr>
                    <td>
                      <Link to={`/events/${volunteer.id}`}>
                        Dalyvauta renginių
                      </Link>
                    </td>
                    <td> 9</td>
                  </tr>
                </tbody>
              </Table>
            </Row>
          </Col>
        </Row>
      </Container>
    );
  }
}

export default VolunteerProfileInfo;

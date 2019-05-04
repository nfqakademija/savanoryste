import React from 'react';
import Tab from 'react-bootstrap/Tab';
import Tabs from 'react-bootstrap/Tabs';
import Container from 'react-bootstrap/Container';
import Col from 'react-bootstrap/Col';
import Row from 'react-bootstrap/Row';
import VolunteerProfileCard from './VolunteerProfileCard';
import { connect } from 'react-redux';

import { getVolunteer } from '../../actions/volunteersActions';

class VolunteerProfileInfo extends React.Component {
  constructor(props) {
    super(props);
  }

  render() {
    const { volunteer } = this.props;
    console.log(volunteer);

    return (
      <Tabs defaultActiveKey="home" transition={false} id="noanim-tab-example">
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
      </Tabs>
    );
  }
}

export default VolunteerProfileInfo;

import React from 'react';
import Tab from 'react-bootstrap/Tab';
import Tabs from 'react-bootstrap/Tabs';
import Container from 'react-bootstrap/Container';
import Col from 'react-bootstrap/Col';
import Row from 'react-bootstrap/Row';
import VolunteerProfileCard from './VolunteerProfileCard';

const VolunteerProfile = () => (
  <Container style={{ margin: 'auto' }}>
    <Row>
      <Col xs={12} sm={12} lg={4}>
        <VolunteerProfileCard />
      </Col>
      <Col xs={12} sm={12} lg={8}>
        <Tabs
          defaultActiveKey="home"
          transition={false}
          id="noanim-tab-example"
        >
          <Tab eventKey="home" title="Profile">
            <Container className="profile-info-container">
              <Row>
                <h3>Full name</h3>
              </Row>
              <Row>
                <h4>
                  Vardenis Pavardenis <hr />
                </h4>
                <hr />
              </Row>
              <Row>
                <h3>About</h3>
              </Row>
              <Row>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  Praesent pellentesque dui eget pharetra ornare. Sed
                  scelerisque facilisis leo non efficitur.
                  <hr />
                </p>
              </Row>
              <Row>
                <h3>City, Country</h3>
              </Row>
              <Row>
                <h4>
                  Vilnius, Lithuania
                  <hr />
                </h4>
              </Row>
              <Row>
                <h3>Phone</h3>
              </Row>
              <Row>
                <h4>
                  +370 6730 6581 <hr />
                </h4>
              </Row>
              <Row>
                <h3>Email</h3>
              </Row>
              <Row>
                <h4>vardenis.pavardenis@gmail.com</h4>
              </Row>
            </Container>
          </Tab>
          <Tab eventKey="profile" title="Attended Events">
            Test1
          </Tab>
          <Tab eventKey="contact" title="Reviews">
            Test2
          </Tab>
        </Tabs>
      </Col>
    </Row>
  </Container>
);

export default VolunteerProfile;

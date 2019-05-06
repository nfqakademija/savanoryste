import React from 'react';
import Container from 'react-bootstrap/Container';
import Col from 'react-bootstrap/Col';
import Row from 'react-bootstrap/Row';
import Card from 'react-bootstrap/Card';
import Image from 'react-bootstrap/Image';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faQuoteLeft, faStar } from '@fortawesome/free-solid-svg-icons';

const VolunteerReviewCard = () => (
  <Card
    border="secondary"
    style={{ paddingTop: '10px', paddingBottom: '10px' }}
  >
    <Container>
      <Row>
        <Col>
          <FontAwesomeIcon icon={faQuoteLeft} />
          <p style={{ textAlign: 'justify' }}>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer
            tortor ante, scelerisque ac ultricies et, varius ut nisi. Orci
            varius natoque penatibus et magnis dis parturient montes, nascetur
            ridiculus mus.
          </p>
        </Col>
      </Row>
      <Row>
        <Col xs={3}>
          <Image src="https://via.placeholder.com/100" roundedCircle />
        </Col>
        <Col style={{ alignSelf: 'center' }}>
          <Row>Vardenis Pavardenis</Row>
          <Row>VGTU</Row>
        </Col>
        <Col style={{ alignSelf: 'center' }}>
          <Row>
            <span>
              <FontAwesomeIcon icon={faStar} />
              <FontAwesomeIcon icon={faStar} />
              <FontAwesomeIcon icon={faStar} />
              <FontAwesomeIcon icon={faStar} />
            </span>
          </Row>
        </Col>
      </Row>
    </Container>
  </Card>
);

export default VolunteerReviewCard;

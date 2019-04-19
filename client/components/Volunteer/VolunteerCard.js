import React from 'react';
import Button from 'react-bootstrap/Button';
import Card from 'react-bootstrap/Card';
import Collapse from 'react-bootstrap/Collapse';
import Container from 'react-bootstrap/Container';
import Col from 'react-bootstrap/Col';
import Row from 'react-bootstrap/Row';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import {
  faEnvelope,
  faPhone,
  faMapMarkerAlt
} from '@fortawesome/free-solid-svg-icons';

class VolunteerCard extends React.Component {
  constructor(props) {
    super(props);

    this.state = {
      open: false
    };
  }

  render() {
    const { open } = this.state;

    return (
      <Card className="volunteer-card">
        <Card.Body className="text-center">
          <Card.Img
            className="avatar rounded-circle"
            src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/robert.jpg"
          />
          <Card.Title variant="h4" className="card-title">
            Vardenis Pavardenis
          </Card.Title>
          <Card.Subtitle className="card-subtitle mb-2 text-muted">
            Kategorija, Kategorija, Kategorija
          </Card.Subtitle>
          <p className="card-text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent
            pellentesque dui eget pharetra ornare. Sed scelerisque facilisis leo
            non efficitur.
          </p>
          <Button
            onClick={() => this.setState({ open: !open })}
            aria-controls="example-collapse-text"
            aria-expanded={open}
            className="btn btn-info"
          >
            Contact Info
          </Button>

          <a href="#" className="btn btn-outline-info">
            View Profile
          </a>
        </Card.Body>

        <Collapse in={open}>
          <div className="contact-collapse">
            <Card.Footer>
              <Container>
                <Col>
                  <Row>
                    <FontAwesomeIcon icon={faEnvelope} />
                    vardenis.parvedinis@gmail.com
                  </Row>
                  <Row>
                    <FontAwesomeIcon icon={faPhone} />
                    +370 6730 6581
                  </Row>
                  <Row>
                    <FontAwesomeIcon icon={faMapMarkerAlt} />
                    Vilnius
                  </Row>
                </Col>
              </Container>
            </Card.Footer>
          </div>
        </Collapse>
      </Card>
    );
  }
}

export default VolunteerCard;

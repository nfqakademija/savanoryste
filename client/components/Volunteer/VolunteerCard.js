import React from 'react';
import Button from 'react-bootstrap/Button';
import Card from 'react-bootstrap/Card';
import Collapse from 'react-bootstrap/Collapse';
import Container from 'react-bootstrap/Container';
import Col from 'react-bootstrap/Col';
import Row from 'react-bootstrap/Row';
import { Link } from 'react-router-dom';
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
    const { volunteer } = this.props;
    return (
      <Card className="volunteer-card">
        <Card.Body className="text-center">
          <Card.Img
            className="avatar rounded-circle"
            src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/robert.jpg"
          />
          <Card.Title variant="h4" className="card-title">
            {`${volunteer.firstname} ${volunteer.lastname}`}
          </Card.Title>
          <Card.Subtitle className="card-subtitle mb-2 text-muted">
            {volunteer.job_type}
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
          <Link className="btn btn-outline-info" to="/profile">
            View profile
          </Link>
        </Card.Body>

        <Collapse in={open}>
          <div className="contact-collapse">
            <Card.Footer>
              <Container>
                <Col>
                  <Row>
                    <FontAwesomeIcon icon={faEnvelope} />
                    {volunteer.email}
                  </Row>
                  <Row>
                    <FontAwesomeIcon icon={faPhone} />
                    {volunteer.phone}
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

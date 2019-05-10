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
      <div className="u-topBottomMargin">
        <Card className="Card">
          <Card.Body className="text-center">
            <Card.Img
              className="Card Card-avatar rounded-circle"
              src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/robert.jpg"
            />
            <Card.Title variant="h4" className="Card Card-fullName">
              {`${volunteer.firstname} ${volunteer.lastname}`}
            </Card.Title>
            <Card.Subtitle className="card-subtitle mb-2 text-muted">
              Category
            </Card.Subtitle>
            <Card.Text>{volunteer.jobs.map(job => job.jobType)}</Card.Text>
            <Card.Subtitle className="card-subtitle mb-2 text-muted">
              Languages
            </Card.Subtitle>
            <Card.Text>English</Card.Text>
            <div className="button-wrapper">
              <Button
                className="Card-button Card-button-transparent btn-outline-info"
                href={`/profile/${volunteer.id}`}
              >
                See profile
              </Button>
              <Button className="Card-button btn btn-info">Choose</Button>
            </div>
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
                      {`${volunteer.city}, ${volunteer.country}`}
                    </Row>
                  </Col>
                </Container>
              </Card.Footer>
            </div>
          </Collapse>
        </Card>
      </div>
    );
  }
}

export default VolunteerCard;

import React from 'react';
import Button from 'react-bootstrap/Button';
import Card from 'react-bootstrap/Card';
import Container from 'react-bootstrap/Container';
import Col from 'react-bootstrap/Col';
import Row from 'react-bootstrap/Row';

class VolunteerProfileCard extends React.Component {
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

          <Button
            onClick={() => this.setState({ open: !open })}
            aria-controls="example-collapse-text"
            aria-expanded={open}
            className="btn btn-info"
          >
            Book now
          </Button>

          <Container>
            <Row>
              <Col>
                <Row>Events</Row>
                <Row>1000</Row>
              </Col>
              <Col>
                <Row>Events</Row>
                <Row>1000</Row>
              </Col>
              <Col>
                <Row>Events</Row>
                <Row>1000</Row>
              </Col>
            </Row>
          </Container>
        </Card.Body>
      </Card>
    );
  }
}

export default VolunteerProfileCard;

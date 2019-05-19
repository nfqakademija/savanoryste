import React from 'react';
import Form from 'react-bootstrap/Form';
import Row from 'react-bootstrap/Row';
import Col from 'react-bootstrap/Col';
import Button from 'react-bootstrap/Button';
const VolunteerProfileEdit = props => {
  const { volunteer } = props;
  return (
    <React.Fragment>
      <h3>Edit Profile</h3>
      <Form>
        <Row>
          <Col>
            <Form.Group controlId="formBasicEmail">
              <Form.Label>First Name</Form.Label>
              <Form.Control
                type="email"
                placeholder="Enter first name"
                defaultValue={volunteer.firstname}
              />
            </Form.Group>
          </Col>
          <Col>
            <Form.Group controlId="formBasicEmail">
              <Form.Label>Last Name</Form.Label>
              <Form.Control
                type="email"
                placeholder="Enter last name"
                defaultValue={volunteer.lastname}
              />
            </Form.Group>
          </Col>
        </Row>

        <Form.Group controlId="formBasicEmail">
          <Form.Label>Phone</Form.Label>
          <Form.Control
            type="email"
            placeholder="Enter phone number"
            defaultValue={volunteer.phone}
          />
        </Form.Group>
        <Form.Group controlId="formBasicEmail">
          <Form.Label>Email address</Form.Label>
          <Form.Control
            type="email"
            placeholder="Enter email"
            defaultValue={volunteer.email}
          />
        </Form.Group>
        <Row>
          <Col>
            <Form.Group controlId="formBasicEmail">
              <Form.Label>City</Form.Label>
              <Form.Control
                type="email"
                placeholder="Enter city"
                defaultValue={volunteer.city}
              />
            </Form.Group>
          </Col>
          <Col>
            <Form.Group controlId="formBasicEmail">
              <Form.Label>Country</Form.Label>
              <Form.Control
                type="email"
                placeholder="Enter country"
                defaultValue={volunteer.country}
              />
            </Form.Group>
          </Col>
        </Row>

        <Form.Group controlId="formBasicEmail">
          <Form.Label>Description</Form.Label>
          <Form.Control
            as="textarea"
            rows="2"
            placeholder="Enter description"
            defaultValue={volunteer.description}
          />
        </Form.Group>

        <Button variant="primary" type="submit">
          Submit
        </Button>
      </Form>
    </React.Fragment>
  );
};

export default VolunteerProfileEdit;

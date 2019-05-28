import React from 'react';
import Form from 'react-bootstrap/Form';
import Row from 'react-bootstrap/Row';
import Col from 'react-bootstrap/Col';
import Button from 'react-bootstrap/Button';
import InputGroup from 'react-bootstrap/InputGroup';
class VolunteerProfileEdit extends React.Component {
  constructor(props) {
    super(props);
  }

  render() {
    const { volunteer } = this.props;
    return (
      <React.Fragment>
        <h3>Redaguoti profilį</h3>
        <Form>
          <Row>
            <Col>
              <Form.Group controlId="formBasicEmail">
                <Form.Label>Vardas</Form.Label>

                <Form.Control
                  type="text"
                  placeholder="Įveskite vardą"
                  defaultValue={volunteer.firstname}
                />
              </Form.Group>
            </Col>
            <Col>
              <Form.Group controlId="formBasicEmail">
                <Form.Label>Pavardė</Form.Label>
                <Form.Control
                  type="text"
                  placeholder="Įveskite pavardę"
                  defaultValue={volunteer.lastname}
                />
              </Form.Group>
            </Col>
          </Row>

          <Form.Group controlId="formBasicEmail">
            <Form.Label>Tel. nr.</Form.Label>
            <InputGroup>
              <InputGroup.Prepend>
                <InputGroup.Text id="basic-addon1">+370</InputGroup.Text>
              </InputGroup.Prepend>
              <Form.Control
                type="tel"
                placeholder="Įveskite telefono numerį"
                defaultValue={volunteer.phone}
              />
            </InputGroup>
          </Form.Group>
          <Form.Group controlId="formBasicEmail">
            <Form.Label>El. paštas</Form.Label>
            <Form.Control
              type="email"
              placeholder="Įveskite el. pašto adresą"
              defaultValue={volunteer.email}
            />
          </Form.Group>
          <Row>
            <Col>
              <Form.Group controlId="formBasicEmail">
                <Form.Label>Miestas</Form.Label>
                <Form.Control
                  type="text"
                  placeholder="Įveskite miestą"
                  defaultValue={volunteer.city}
                />
              </Form.Group>
            </Col>
            <Col>
              <Form.Group controlId="formBasicEmail">
                <Form.Label>Šalis</Form.Label>
                <Form.Control
                  type="text"
                  placeholder="Įveskite šalį"
                  defaultValue={volunteer.country}
                />
              </Form.Group>
            </Col>
          </Row>

          <Form.Group controlId="formBasicEmail">
            <Form.Label>Aprašymas</Form.Label>
            <Form.Control
              as="textarea"
              rows="2"
              placeholder="Įveskite aprašymą"
              defaultValue={volunteer.description}
            />
          </Form.Group>

          <Button variant="primary" type="submit">
            Siųsti
          </Button>
        </Form>
      </React.Fragment>
    );
  }
}

export default VolunteerProfileEdit;

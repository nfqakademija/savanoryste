import React from 'react';
import Form from 'react-bootstrap/Form';
import Button from 'react-bootstrap/Button';
import InputGroup from 'react-bootstrap/InputGroup';
import Container from 'react-bootstrap/Container';
import Row from 'react-bootstrap/Row';
import Col from 'react-bootstrap/Col';

class OrganisationForm extends React.Component {
  constructor(props) {
    super(props);
  }

  render() {
    return (
      <Container>
        <Row className="justify-content-md-center">
          <Col>
            <h2>Organizacijos duomenys</h2>
            <Form action="/organisation/new" method="post">
              <Form.Group controlId="organisationName">
                <Form.Label className="label-text">
                  Įmonės pavadinimas
                </Form.Label>
                <Form.Control type="text" name="title" required />
              </Form.Group>

              <Form.Group controlId="organisationEmail">
                <Form.Label className="label-text">El. paštas</Form.Label>
                <Form.Control type="email" name="email" required />
              </Form.Group>

              <Form.Group controlId="organisationPhone">
                <Form.Label className="label-text">Telefonas</Form.Label>
                <InputGroup>
                  <InputGroup.Prepend>
                    <InputGroup.Text id="inputGroupPrepend">
                      +370
                    </InputGroup.Text>
                  </InputGroup.Prepend>
                  <Form.Control
                    type="number"
                    aria-describedby="inputGroupPrepend"
                    required
                  />
                </InputGroup>
              </Form.Group>

              <Form.Group controlId="organisationAddress">
                <Form.Label className="label-text">Adresas</Form.Label>
                <Form.Control type="text" name="address" required />
              </Form.Group>
              <Button variant="primary" type="submit">
                Išsaugoti
              </Button>
            </Form>
          </Col>
        </Row>
      </Container>
    );
  }
}

export default OrganisationForm;

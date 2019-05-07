import React from 'react';
import Form from 'react-bootstrap/Form';
import Button from 'react-bootstrap/Button';
import InputGroup from 'react-bootstrap/InputGroup';


class OrganisationForm extends React.Component {

    constructor(props) {
        super(props);

    }
    
    render() {
        
      return  (
        <Form>
        <Form.Group controlId="organisationName">
          <Form.Label className="label-text">Įmonės pavadinimas</Form.Label>
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
                <InputGroup.Text id="inputGroupPrepend">+370</InputGroup.Text>
              </InputGroup.Prepend>
              <Form.Control
                type="number"
                aria-describedby="inputGroupPrepend"
                required/>
              </InputGroup>
        </Form.Group>

        <Form.Group controlId="organisationAddress">
          <Form.Label className="label-text">Adresas</Form.Label>
          <Form.Control type="text" name="address" required />
        </Form.Group>
        
      </Form>
      );

    }
}

export default OrganisationForm;

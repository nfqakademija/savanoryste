import React from 'react';
import Form from 'react-bootstrap/Form';
import Row from 'react-bootstrap/Row';
import Col from 'react-bootstrap/Col';
import Button from 'react-bootstrap/Button';
import InputGroup from 'react-bootstrap/InputGroup';
import { Formik, Field } from 'formik';
import { Form as FormikForm } from 'formik';

const FieldInput = ({
  as,
  rows,
  type,
  id,
  placeholder,
  defaultValue,
  onChange,
  label,
  value
}) => {
  return (
    <Form.Group>
      <Form.Label>{label}</Form.Label>

      <Form.Control
        id={id}
        value={value}
        as={as}
        rows={rows}
        type={type}
        placeholder={placeholder}
        onChange={onChange}
      />
    </Form.Group>
  );
};

const PhoneInput = ({
  input,
  meta,
  type,
  placeholder,
  defaultValue,
  label,
  onChange,
  id,
  value
}) => {
  return (
    <Form.Group controlId="formBasicEmail">
      <Form.Label>{label}</Form.Label>
      <InputGroup>
        <InputGroup.Prepend>
          <InputGroup.Text id="basic-addon1">+370</InputGroup.Text>
        </InputGroup.Prepend>
        <Form.Control
          id={id}
          value={value}
          type={type}
          placeholder={placeholder}
          onChange={onChange}
        />
      </InputGroup>
    </Form.Group>
  );
};

class VolunteerProfileEdit extends React.Component {
  constructor(props) {
    super(props);
    console.log(props);
    this.state = {
      firstname: props.volunteer.firstname,
      lastname: props.volunteer.lastname,
      country: props.volunteer.country,
      city: props.volunteer.city,
      phone: props.volunteer.phone,
      email: props.volunteer.email,
      description: props.volunteer.description
    };

    this.handleChange = this.handleChange.bind(this);
  }

  handleChange(event, name) {
    // const target = event.target;
    // const value = target.value;
    // const namee = target.name;
    // //console.log(event.target.value);
    // console.log(event);
    // console.log(namee);
    // this.setState({
    //   [name]: value
    // });
  }

  render() {
    const { volunteer } = this.props;
    const { firstname } = this.state;
    return (
      <React.Fragment>
        <h3>Redaguoti profilį</h3>
        <Formik
          initialValues={volunteer}
          onSubmit={(values, actions) => {
            console.log(values, actions);
          }}
          handleChange={this.handleChange}
          values={volunteer}
          render={({
            errors,
            status,
            touched,
            isSubmitting,
            values,
            handleChange
          }) => (
            <FormikForm>
              <Row>
                <Col>
                  <Field
                    type="text"
                    id="firstname"
                    name="firstname"
                    component={FieldInput}
                    placeholder="Įveskite vardą"
                    label="Vardas"
                    value={values.firstname}
                    onChange={handleChange}
                  />
                </Col>

                <Col>
                  <Field
                    type="text"
                    id="lastname"
                    name="lastname"
                    component={FieldInput}
                    placeholder="Įveskite pavardę"
                    label="Pavardė"
                    onChange={handleChange}
                    value={values.lastname}
                  />
                </Col>
              </Row>

              <Field
                id="phone"
                type="tel"
                name="phone"
                onChange={handleChange}
                component={PhoneInput}
                placeholder="Įveskite tel. nr."
                label="Tel. nr."
                value={values.phone}
              />

              <Field
                name="email"
                id="email"
                component={FieldInput}
                type="email"
                onChange={handleChange}
                label="El. paštas"
                value={values.email}
                placeholder="Įveskite el. pašto adresą"
              />
              <Row>
                <Col>
                  <Field
                    id="city"
                    type="text"
                    name="city"
                    onChange={handleChange}
                    label="Miestas"
                    value={values.city}
                    component={FieldInput}
                    placeholder="Įveskite miestą"
                  />
                </Col>
                <Col>
                  <Field
                    id="country"
                    type="text"
                    label="Šalis"
                    onChange={handleChange}
                    value={values.country}
                    name="country"
                    component={FieldInput}
                    placeholder="Įveskite šalį"
                  />
                </Col>
              </Row>
              <Field
                id="description"
                label="Aprašymas"
                name="description"
                onChange={handleChange}
                component={FieldInput}
                value={values.description}
                as="textarea"
                rows="2"
                placeholder="Įveskite aprašymą"
              />
              <Button
                variant="primary"
                type="submit"
                //onClick={this.handleChange}
              >
                Siųsti
              </Button>
            </FormikForm>
          )}
        />
      </React.Fragment>
    );
  }
}
export default VolunteerProfileEdit;

{
  /* <h3>Redaguoti profilį</h3>
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
</Form> */
}

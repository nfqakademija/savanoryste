import React from 'react';
import Form from 'react-bootstrap/Form';
import Row from 'react-bootstrap/Row';
import Col from 'react-bootstrap/Col';
import Button from 'react-bootstrap/Button';
import InputGroup from 'react-bootstrap/InputGroup';
import { Formik, Field, ErrorMessage } from 'formik';
import { Form as FormikForm } from 'formik';
import { connect } from 'react-redux';
import { editVolunteer } from '../../actions/volunteersActions';
import * as Yup from 'yup';

const ProfileEditSchema = Yup.object().shape({
  firstname: Yup.string()
    .min(2, 'Too Short!')
    .max(50, 'Too Long!')
    .required('Required'),
  lastname: Yup.string()
    .min(2, 'Too Short!')
    .max(50, 'Too Long!')
    .required('Required'),
  email: Yup.string()
    .email('Invalid email')
    .required('Required'),
  phone: Yup.string()
    .test('len', 'Numeris turi būti 8 skaitmenų', val => val.length === 8)
    .required('Required'),
  city: Yup.string()
    .min(2, 'Too Short!')
    .max(50, 'Too Long!')
    .required('Required'),
  country: Yup.string()
    .min(2, 'Too Short!')
    .max(50, 'Too Long!')
    .required('Required'),
  description: Yup.string()
    .min(2, 'Too Short!')
    .max(50, 'Too Long!')
    .required('Required')
});

const FieldInput = ({
  as,
  rows,
  type,
  id,
  placeholder,
  onChange,
  label,
  value,
  errors
}) => {
  return (
    <Form.Group>
      <Form.Label>{label}</Form.Label>

      {errors != undefined ? (
        <div>
          <Form.Control
            id={id}
            value={value}
            as={as}
            rows={rows}
            type={type}
            placeholder={placeholder}
            onChange={onChange}
            isInvalid={!!errors[id]}
          />
          <Form.Control.Feedback type="invalid">
            {errors[id]}
          </Form.Control.Feedback>
        </div>
      ) : null}
    </Form.Group>
  );
};

const PhoneInput = ({
  type,
  placeholder,
  label,
  onChange,
  id,
  value,
  errors
}) => {
  return (
    <Form.Group controlId="formBasicEmail">
      <Form.Label>{label}</Form.Label>

      {errors != undefined ? (
        <div>
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
              isInvalid={!!errors[id]}
            />
            <Form.Control.Feedback type="invalid">
              {errors[id]}
            </Form.Control.Feedback>
          </InputGroup>
        </div>
      ) : null}
    </Form.Group>
  );
};

class VolunteerProfileEdit extends React.Component {
  constructor(props) {
    super(props);
  }
  render() {
    const { volunteer } = this.props;
    const { editVolunteer } = this.props;
    return (
      <React.Fragment>
        <h3>Redaguoti profilį</h3>
        <Formik
          noValidate
          initialValues={volunteer}
          onSubmit={(values, actions) => {
            editVolunteer(volunteer.id, values);
          }}
          handleChange
          validationSchema={ProfileEditSchema}
          values={volunteer}
          render={({
            errors,
            status,
            touched,
            isSubmitting,
            values,
            isValid,
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
                    errors={errors}
                    touched={touched}
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
                    errors={errors}
                    touched={touched}
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
                errors={errors}
                touched={touched}
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
                errors={errors}
                touched={touched}
              />
              {errors.email && touched.email ? <div>{errors.email}</div> : null}
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
                    errors={errors}
                    touched={touched}
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
                    errors={errors}
                    touched={touched}
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
                errors={errors}
                touched={touched}
              />
              <Button variant="primary" type="submit">
                Siųsti
              </Button>
            </FormikForm>
          )}
        />
      </React.Fragment>
    );
  }
}
const mapStateToProps = state => ({
  volunteers: state.volunteers.volunteers,
  loading: state.volunteers.loading,
  start: state.volunteers.start,
  count: state.volunteers.count
});

const mapDispatchToProps = dispatch => ({
  editVolunteer: (id, data) => dispatch(editVolunteer(id, data))
});

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(VolunteerProfileEdit);

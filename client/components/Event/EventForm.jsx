import React from 'react';
import Form from 'react-bootstrap/Form';
import Row from 'react-bootstrap/Row';
import Col from 'react-bootstrap/Col';
import Button from 'react-bootstrap/Button';
import InputGroup from 'react-bootstrap/InputGroup';
import { Formik, Field } from 'formik';
import { Form as FormikForm } from 'formik';
import { connect } from 'react-redux';
import { createEvent } from '../../actions/eventActions';

const FieldInput = ({
  as,
  rows,
  type,
  id,
  placeholder,
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

class EventForm extends React.Component {
  constructor(props) {
    super(props);
  }
  render() {
    const { event } = this.props;
    const { createEvent } = this.props;
    return (
      <React.Fragment>
        <h3>Sukurti renginį</h3>
        <Formik
          initialValues={event}
          onSubmit={(values, actions) => {
            createEvent(values);
          }}
          handleChange
          values={event}
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
                    id="title"
                    name="title"
                    component={FieldInput}
                    placeholder="Įveskite pavadinimą"
                    label="Pavadinimas"
                    value={values.title}
                    onChange={handleChange}
                  />
                </Col>
             </Row>

             <Row>
                <Col>
                  <Field
                    type="text"
                    id="description"
                    name="description"
                    component={FieldInput}
                    placeholder="Įveskite aprašymą"
                    label="Aprašymas"
                    onChange={handleChange}
                    value={values.description}
                  />
                </Col>
              </Row>

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
//   event: state.event.event,
});

const mapDispatchToProps = dispatch => ({
  createEvent: (data) => dispatch(createEvent(data))
});

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(EventForm);

import React from 'react';
import Container from 'react-bootstrap/Container';
import Row from 'react-bootstrap/Row';
import Col from 'react-bootstrap/Col';
import Form from 'react-bootstrap/Form';
import Button from 'react-bootstrap/Button';
import DateRangePicker from 'react-bootstrap-daterangepicker';
import 'bootstrap-daterangepicker/daterangepicker.css';


class EventForm extends React.Component {

    constructor(props) {
        super(props);
            this.state = {
                startDate: '',
                endDate: '',
            }
            this.startDateEvent = this.startDateEvent.bind(this);
            this.endDateEvent = this.endDateEvent.bind(this);
    }
    
    startDateEvent(event, picker) {
        let finalDate = picker.startDate._d.getFullYear() + '-' + picker.startDate._d.getMonth() + '-' + picker.startDate._d.getDate();

        this.setState({
            startDate : finalDate,
        });
      }
    endDateEvent(event, picker) {
        let finalDate = picker.startDate._d.getFullYear() + '-' + picker.startDate._d.getMonth() + '-' + picker.startDate._d.getDate();
        
        this.setState({
            endDate : finalDate,
        });
    }

    render() {
        
      return  (
        <Container>
            <Row className="justify-content-md-center">
                <Col>
                    <h2>Sukurk renginį</h2>
                    
                    <Form action="/event/new" method="post">
                        <Form.Group controlId="eventTitle">
                            <Form.Label className="label-text">Pavadinimas:</Form.Label>
                            <Form.Control type="text" name="title" required />
                            <Form.Control.Feedback type="invalid">
                             Įveskite pavadinimą
                            </Form.Control.Feedback>         
                        </Form.Group>

                        <Form.Group controlId="eventDescription">
                            <Form.Label className="label-text">Aprašymas:</Form.Label>
                            <Form.Control as="textarea" rows="3" name="description" required />
                            <Form.Control.Feedback type="invalid">
                             Įveskite aprašymą
                            </Form.Control.Feedback>  
                        </Form.Group>
                        
                        <Form.Group controlId="eventStartDate">
                            <Form.Label className="label-text">Pradžios data:</Form.Label>
                            <DateRangePicker onApply={this.startDateEvent} singleDatePicker><input className="form-control" value = {this.state.startDate} name="startDate" required></input></DateRangePicker>
                        </Form.Group>

                        <Form.Group controlId="eventEndDate">
                            <Form.Label className="label-text">Pabaigos data:</Form.Label>
                            <DateRangePicker onApply={this.endDateEvent} singleDatePicker><input className="form-control" value = {this.state.endDate} name="endDate" required></input></DateRangePicker>
                        </Form.Group>
                        <Button variant="primary" type="submit">Sukurk</Button>
                    </Form>
                </Col>
            </Row>
        </Container>
      );

    }
}

export default EventForm;

import React from 'react';
import { connect } from 'react-redux';
import Container from 'react-bootstrap/Container';
import Col from 'react-bootstrap/Col';
import Row from 'react-bootstrap/Row';
import VolunteerCard from './VolunteerCard';

import '../App.css';

class VolunteerList extends React.Component {
  constructor(props) {
    super(props);

    props.getVolunteers();
  }

  render() {
    const { volunteers } = this.props;
    return (
      <Container>
        <Row>
          {volunteers.map(volunteer => (
            <Col xs={12} sm={8} lg={4}>
              <VolunteerCard volunteer={volunteer} />
            </Col>
          ))}
        </Row>
      </Container>
    );
  }
}

const mapStateToProps = state => ({
  volunteers: state.volunteers.volunteers,
  loading: state.volunteers.loading
});

const mapDispatchToProps = dispatch => ({
  getVolunteers: () => dispatch({ type: 'VOLUNTEERS_CALL_REQUEST' })
});

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(VolunteerList);

import React from 'react';
import Tab from 'react-bootstrap/Tab';
import Tabs from 'react-bootstrap/Tabs';
import Container from 'react-bootstrap/Container';
import Col from 'react-bootstrap/Col';
import Row from 'react-bootstrap/Row';
import { Link } from 'react-router-dom';
import VolunteerProfileEdit from './VolunteerProfileEdit';
import VolunteerProfileCard from './VolunteerProfileCard';
import VolunteerProfileInfo from './VolunteerProfileInfo';
import VolunteerReviewCard from './VolunteerReviewCard';
import Button from 'react-bootstrap/Button';
import { connect } from 'react-redux';
import EventCard from '../Event/EventCard';

import { getVolunteer } from '../../actions/volunteersActions';

class VolunteerProfile extends React.Component {
  constructor(props) {
    super(props);
    props.getVolunteer(props.match.params.id);

    this.state = {
      isEditing: false
    };
  }

  onEditClick = () => {
    this.setState({ isEditing: !this.state.isEditing });
  };

  render() {
    const { volunteer, loading } = this.props;
    const { isEditing } = this.state;

    return Object.entries(volunteer).length === 0 &&
      volunteer.constructor === Object ? (
      <h1>Loading</h1>
    ) : (
      <Container style={{ margin: 'auto' }}>
        <Button onClick={this.onEditClick}>Edit</Button>
        <Row>
          <Col xs={8} sm={8} md={5} lg={4}>
            <VolunteerProfileCard volunteer={volunteer} />
          </Col>
          <Col xs={12} sm={12} md={7}>
            {!isEditing ? (
              <VolunteerProfileInfo volunteer={volunteer} />
            ) : (
              <VolunteerProfileEdit volunteer={volunteer} />
            )}
          </Col>
        </Row>
        <Row style={{ marginTop: '10px' }}>
          <Col>
            <h3>Latest review</h3>
            <VolunteerReviewCard />
          </Col>
          <Col>
            <h3>Latest event attended</h3>

            <EventCard />
          </Col>
        </Row>
      </Container>
    );
  }
}

const mapStateToProps = state => ({
  volunteer: state.volunteers.volunteer,
  loading: state.volunteers.loading
});

const mapDispatchToProps = dispatch => ({
  getVolunteer: id => dispatch(getVolunteer(id))
});

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(VolunteerProfile);

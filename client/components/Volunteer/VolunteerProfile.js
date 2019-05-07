import React from 'react';
import Tab from 'react-bootstrap/Tab';
import Tabs from 'react-bootstrap/Tabs';
import Container from 'react-bootstrap/Container';
import Col from 'react-bootstrap/Col';
import Row from 'react-bootstrap/Row';
import VolunteerProfileCard from './VolunteerProfileCard';
import VolunteerProfileInfo from './VolunteerProfileInfo';
import VolunteerReviewCard from './VolunteerReviewCard';
import { connect } from 'react-redux';

import { getVolunteer } from '../../actions/volunteersActions';

class VolunteerProfile extends React.Component {
  constructor(props) {
    super(props);
    props.getVolunteer(props.match.params.id);
  }

  render() {
    const { volunteer, loading } = this.props;

    return Object.entries(volunteer).length === 0 &&
      volunteer.constructor === Object ? (
      <h1>Loading</h1>
    ) : (
      <Container style={{ margin: 'auto' }}>
        <Row>
          <Col xs={12} sm={12} lg={4}>
            <VolunteerProfileCard volunteer={volunteer} />
          </Col>
          <Col xs={12} sm={12} lg={8}>
            <VolunteerProfileInfo volunteer={volunteer} />
          </Col>
        </Row>
        <Row style={{ marginTop: '10px' }}>
          <Col>
            <h3>Latest review</h3>
            <VolunteerReviewCard />
          </Col>
          <Col>
            <h3>Latest event attended</h3>

            <VolunteerReviewCard />
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

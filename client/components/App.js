import React from 'react';
import { connect } from 'react-redux';
import { Switch, Route } from 'react-router-dom';
import Container from 'react-bootstrap/Container';
import Col from 'react-bootstrap/Col';
import Row from 'react-bootstrap/Row';
import AppBar from './AppBar';
import VolunteerList from './Volunteer/VolunteerList';
import VolunteerProfile from './Volunteer/VolunteerProfile';

import { getVolunteerList } from '../actions/volunteersActions';

import './App.css';

class App extends React.Component {
  constructor(props) {
    super(props);
  }

  render() {
    return (
      <div>
        <AppBar className="container" />
        <Container className="volunteer-list">
          <Switch>
            <Route exact path="/" component={VolunteerList} />
            <Route path="/profile" component={VolunteerProfile} />
          </Switch>
        </Container>
      </div>
    );
  }
}

const mapStateToProps = state => ({
  volunteerList: state.volunteers.volunteerList
});

const mapDispatchToProps = dispatch => ({
  onGetVolunteerList: () => dispatch(getVolunteerList())
});

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(App);

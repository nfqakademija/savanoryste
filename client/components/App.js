import React from 'react';
import { Switch, Route } from 'react-router-dom';
import AppBar from './AppBar';
import VolunteerList from './Volunteer/VolunteerList';
import VolunteerProfile from './Volunteer/VolunteerProfile';
import EventForm from './Event/EventForm';
import OrganisationForm from './Organisation/OrganisationForm';

import './App.css';
import EventList from './Event/EventList';

const App = props => (
  <div>
    {/* <AppBar className="container" /> */}

    <Switch>
      {props.main === 'volunteerlist' ? (
        <Route exact path="/" component={VolunteerList} />
      ) : (
        <Route exact path="/" component={EventList} />
      )}
      <Route path="/profile/:id" component={VolunteerProfile} />
      <Route path="/event" component={EventForm} />
      <Route path="/organisation" component={OrganisationForm} />
      <Route path="/events/:id" />
      <Route path="/reviews/:id" />
    </Switch>
  </div>
);

export default App;

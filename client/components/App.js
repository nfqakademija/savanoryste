import React from 'react';
import { Switch, Route } from 'react-router-dom';
import AppBar from './AppBar';
import VolunteerList from './Volunteer/VolunteerList';
import VolunteerProfile from './Volunteer/VolunteerProfile';
import EventForm from './Event/EventForm';

import './App.css';

const App = () => (
  <div>
    <AppBar className="container" />
    <Switch>
      <Route exact path="/" component={VolunteerList} />
      <Route path="/profile/:id" component={VolunteerProfile} />
      <Route path="/event" component={EventForm} />
    </Switch>
  </div>
);

export default App;

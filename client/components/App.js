import React from 'react';
import VolunteerCard from './Volunteer/VolunteerCard';

import './App.css';

const App = () => (
  <div className="container">
    <div className="row">
      <div className="col-sm">
        <VolunteerCard />
      </div>
      <div className="col-sm">
        <VolunteerCard />
      </div>
      <div className="col-sm">
        <VolunteerCard />
      </div>
    </div>
    <div className="row">
      <div className="col-sm">
        <VolunteerCard />
      </div>
      <div className="col-sm">
        <VolunteerCard />
      </div>
      <div className="col-sm">
        <VolunteerCard />
      </div>
    </div>
  </div>
);

export default App;

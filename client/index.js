import 'bootstrap/dist/css/bootstrap.css';
import 'bootswatch/dist/yeti/bootstrap.min.css';

import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter } from 'react-router-dom';

import { Provider } from 'react-redux';
import store from './store';
import App from './components/App';
import VolunteerList from './components/Volunteer/VolunteerList';
import OrganisationForm from './components/Organisation/OrganisationForm';

// ReactDOM.render(
//   <BrowserRouter>
//     <Provider store={store}>
//       {window.renderId === 'volunteerList' ? <OrganisationForm /> : <App />}
//     </Provider>
//   </BrowserRouter>,
//   document.getElementById('root')
// );

ReactDOM.render(
  <BrowserRouter>
    <Provider store={store}>
      <App />
    </Provider>
  </BrowserRouter>,
  document.getElementById('volunteer-list')
);

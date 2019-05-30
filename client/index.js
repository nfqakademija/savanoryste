import 'bootstrap/dist/css/bootstrap.css';
import 'bootswatch/dist/yeti/bootstrap.min.css';

import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter } from 'react-router-dom';

import { Provider } from 'react-redux';
import store from './store';
import App from './components/App';

ReactDOM.render(
  <BrowserRouter>
    <Provider store={store}>
      <App main="volunteerlist" />
    </Provider>
  </BrowserRouter>,
  document.getElementById('volunteer-list')
);

ReactDOM.render(
  <BrowserRouter>
    <Provider store={store}>
      <App main="eventlist" />
    </Provider>
  </BrowserRouter>,
  document.getElementById('event-list')
);

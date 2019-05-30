import { combineReducers } from 'redux';
import volunteersReducer from './volunteersReducer';
import eventsReducer from './eventsReducer';
import usersReducer from './usersReducer';

export default combineReducers({
  volunteers: volunteersReducer,
  events: eventsReducer,
  users: usersReducer
});

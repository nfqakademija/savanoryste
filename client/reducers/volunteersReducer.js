import { GET_VOLUNTEER_LIST, GET_VOLUNTEER } from '../actions/types';

const initialState = {
  volunteerList: [],
  volunteer: {}
};

const volunteersReducer = (state = initialState, action) => {
  switch (action.type) {
    case GET_VOLUNTEER_LIST:
      return {
        volunteerList: action.payload
      };
    case GET_VOLUNTEER:
      return {
        volunteer: action.payload
      };
    default:
      return state;
  }
};

export default volunteersReducer;

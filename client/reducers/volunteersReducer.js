import { GET_VOLUNTEER_LIST } from '../actions/types';

const initialState = {
  volunteerList: []
};

const volunteersReducer = (state = initialState, action) => {
  switch (action.type) {
    case GET_VOLUNTEER_LIST:
      return {
        volunteerList: action.payload.Volunteer
      };
    default:
      return state;
  }
};

export default volunteersReducer;

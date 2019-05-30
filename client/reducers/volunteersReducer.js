import {
  VOLUNTEERS_CALL_FAILURE,
  VOLUNTEERS_CALL_REQUEST,
  VOLUNTEERS_CALL_SUCCESS,
  VOLUNTEER_CALL_FAILURE,
  VOLUNTEER_CALL_REQUEST,
  VOLUNTEER_CALL_SUCCESS,
  EDIT_VOLUNTEER_FAILURE,
  EDIT_VOLUNTEER_REQUEST,
  EDIT_VOLUNTEER_SUCCESS
} from '../actions/types';

const initialState = {
  volunteers: [],
  volunteer: {},
  loading: false,
  volunteerLoading: false,
  count: 10,
  start: 0
};

const volunteersReducer = (state = initialState, action) => {
  switch (action.type) {
    case VOLUNTEERS_CALL_REQUEST:
      return { ...state, loading: true, error: null };
    case VOLUNTEERS_CALL_SUCCESS:
      return {
        ...state,
        loading: false,
        volunteers: [...state.volunteers, ...action.volunteers],
        start: state.start + 10
      };
    case VOLUNTEERS_CALL_FAILURE:
      return {
        ...state,
        loading: false,
        volunteers: null,
        error: action.error
      };
    case VOLUNTEER_CALL_REQUEST:
      return { ...state, loading: true, error: null };
    case VOLUNTEER_CALL_SUCCESS:
      return { ...state, loading: false, volunteer: action.volunteer[0] };
    case VOLUNTEER_CALL_FAILURE:
      return {
        ...state,
        loading: false,
        volunteer: {},
        error: action.error
      };
    case EDIT_VOLUNTEER_REQUEST:
      return { ...state, volunteerLoading: true, error: null };
    case EDIT_VOLUNTEER_SUCCESS:
      return { ...state, volunteerLoading: false, volunteer: action.volunteer };
    case EDIT_VOLUNTEER_FAILURE:
      return {
        ...state,
        volunteerLoading: false,
        volunteer: {},
        error: action.error
      };
    default:
      return state;
  }
};

export default volunteersReducer;

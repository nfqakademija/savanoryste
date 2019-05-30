import {
  VOLUNTEER_USER_CALL_FAILURE,
  VOLUNTEER_USER_CALL_REQUEST,
  VOLUNTEER_USER_CALL_SUCCESS,
  ORGANISATION_USER_CALL_FAILURE,
  ORGANISATION_USER_CALL_REQUEST,
  ORGANISATION_USER_CALL_SUCCESS
} from '../actions/types';

const initialState = {
  volunteerUser: {},
  organisationUser: {},
  loading: false,
  error: {}
};

const usersReducer = (state = initialState, action) => {
  switch (action.type) {
    case VOLUNTEER_USER_CALL_REQUEST:
      return { ...state, loading: true, error: null };
    case VOLUNTEER_USER_CALL_SUCCESS:
      console.log(action, 'actionas');
      return { ...state, loading: false, volunteerUser: action.user[0] };
    case VOLUNTEER_USER_CALL_FAILURE:
      console.log(action);
      return {
        ...state,
        loading: false,
        volunteerUser: null,
        error: action.error
      };
    case ORGANISATION_USER_CALL_REQUEST:
      return { ...state, loading: true, error: null };
    case ORGANISATION_USER_CALL_SUCCESS:
      return {
        ...state,
        loading: false,
        organisationUser: action.organisation[0]
      };
    case ORGANISATION_USER_CALL_FAILURE:
      return {
        ...state,
        loading: false,
        organisationUser: null,
        error: action.error
      };
    default:
      return state;
  }
};

export default usersReducer;

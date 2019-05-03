import {
  VOLUNTEERS_CALL_FAILURE,
  VOLUNTEERS_CALL_REQUEST,
  VOLUNTEERS_CALL_SUCCESS
} from '../actions/types';

const initialState = {
  volunteers: [],
  loading: false
};

const volunteersReducer = (state = initialState, action) => {
  switch (action.type) {
    case VOLUNTEERS_CALL_REQUEST:
      return { ...state, loading: true, error: null };
    case VOLUNTEERS_CALL_SUCCESS:
      return { ...state, loading: false, volunteers: action.volunteers };
    case VOLUNTEERS_CALL_FAILURE:
      return {
        ...state,
        loading: false,
        volunteers: null,
        error: action.error
      };
    default:
      return state;
  }
};

export default volunteersReducer;

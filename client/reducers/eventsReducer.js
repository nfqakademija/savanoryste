import {
  EVENTS_CALL_FAILURE,
  EVENTS_CALL_REQUEST,
  EVENTS_CALL_SUCCESS,
  EVENT_CALL_FAILURE,
  EVENT_CALL_REQUEST,
  EVENT_CALL_SUCCESS,
  CREATE_EVENT_REQUEST,
  CREATE_EVENT_FAILURE,
  CREATE_EVENT_SUCCESS
} from '../actions/types';

const initialState = {
  events: [],
  event: {},
  loading: false
};

const eventsReducer = (state = initialState, action) => {
  switch (action.type) {
    case EVENTS_CALL_REQUEST:
      return { ...state, loading: true, error: null };
    case EVENTS_CALL_SUCCESS:
      return {
        ...state,
        loading: false,
        events: [...state.events, ...action.events]
      };
    case EVENTS_CALL_FAILURE:
      return {
        ...state,
        loading: false,
        events: null,
        error: action.error
      };
    case EVENT_CALL_REQUEST:
      return { ...state, loading: true, error: null };
    case EVENT_CALL_SUCCESS:
      return { ...state, loading: false, volunteer: action.event[0] };
    case EVENT_CALL_FAILURE:
      return {
        ...state,
        loading: false,
        event: null,
        error: action.error
      };
    case CREATE_EVENT_REQUEST:
      return { ...state, error: null };
    case CREATE_EVENT_SUCCESS:
      return { ...state, event: action.event };
    case CREATE_EVENT_FAILURE:
      return {
        ...state,
        event: {},
        error: action.error
      };
    default:
      return state;
  }
};

export default eventsReducer;

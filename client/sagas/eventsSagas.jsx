import { takeLatest, call, put } from 'redux-saga/effects';
import axios from 'axios';
import { endpoints } from '../endpoints';

export function* eventsWatcherSaga() {
  yield takeLatest('EVENTS_CALL_REQUEST', eventsWorkerSaga);
}

function fetchEvents(action) {
  return axios.get(endpoints.eventList(action.count, action.start));
}

function* eventsWorkerSaga(action) {
  try {
    const response = yield call(fetchEvents, action);

    const events = response.data;

    yield put({ type: 'EVENTS_CALL_SUCCESS', events });
  } catch (error) {
    yield put({ type: 'EVENTS_CALL_FAILURE', error });
  }
}

export function* eventWatcherSaga() {
  yield takeLatest('EVENT_CALL_REQUEST', eventWorkerSaga);
}

function fetchEvent(id) {
  return axios.get(endpoints.event(id));
}

function* eventWorkerSaga(action) {
  try {
    const response = yield call(fetchEvent, action.id);

    const event = response.data;
    yield put({ type: 'EVENT_CALL_SUCCESS', event });
  } catch (error) {
    yield put({ type: 'EVENT_CALL_FAILURE', error });
  }
}

import { takeLatest, call, put } from 'redux-saga/effects';
import axios from 'axios';
import { endpoints } from '../endpoints';

// watcher saga: watches for actions dispatched to the store, starts worker saga
export function* watcherSaga() {
  yield takeLatest('VOLUNTEERS_CALL_REQUEST', workerSaga);
}

// function that makes the api request and returns a Promise for response
function fetchVolunteers() {
  return axios.get(endpoints.volunteerList());
}

// worker saga: makes the api call when watcher saga sees the action
function* workerSaga() {
  try {
    const response = yield call(fetchVolunteers);
    const volunteers = response.data;

    // dispatch a success action to the store with the new dog
    yield put({ type: 'VOLUNTEERS_CALL_SUCCESS', volunteers });
  } catch (error) {
    // dispatch a failure action to the store with the error
    yield put({ type: 'VOLUNTEERS_CALL_FAILURE', error });
  }
}

export function* volunteerWatcherSaga() {
  yield takeLatest('VOLUNTEER_CALL_REQUEST', volunteerWorkerSaga);
}

// function that makes the api request and returns a Promise for response
function fetchVolunteer(id) {
  return axios.get(endpoints.volunteer(id));
}

// worker saga: makes the api call when watcher saga sees the action
function* volunteerWorkerSaga(action) {
  try {
    const response = yield call(fetchVolunteer, action.id);

    const volunteer = response.data;
    // dispatch a success action to the store with the new dog
    yield put({ type: 'VOLUNTEER_CALL_SUCCESS', volunteer });
  } catch (error) {
    // dispatch a failure action to the store with the error
    yield put({ type: 'VOLUNTEER_CALL_FAILURE', error });
  }
}

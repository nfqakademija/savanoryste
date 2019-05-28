import { takeLatest, call, put } from 'redux-saga/effects';
import axios from 'axios';
import { endpoints } from '../endpoints';

export function* watcherSaga() {
  yield takeLatest('VOLUNTEERS_CALL_REQUEST', workerSaga);
}

function fetchVolunteers(action) {
  return axios.get(endpoints.volunteerList(action.count, action.start));
}

function* workerSaga(action) {
  try {
    const response = yield call(fetchVolunteers, action);
    const volunteers = response.data;

    yield put({ type: 'VOLUNTEERS_CALL_SUCCESS', volunteers });
  } catch (error) {
    yield put({ type: 'VOLUNTEERS_CALL_FAILURE', error });
  }
}

export function* volunteerWatcherSaga() {
  yield takeLatest('VOLUNTEER_CALL_REQUEST', volunteerWorkerSaga);
}

function fetchVolunteer(id) {
  return axios.get(endpoints.volunteer(id));
}

function* volunteerWorkerSaga(action) {
  try {
    const response = yield call(fetchVolunteer, action.id);

    const volunteer = response.data;
    yield put({ type: 'VOLUNTEER_CALL_SUCCESS', volunteer });
  } catch (error) {
    yield put({ type: 'VOLUNTEER_CALL_FAILURE', error });
  }
}

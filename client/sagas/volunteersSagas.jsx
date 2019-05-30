import { takeLatest, call, put } from 'redux-saga/effects';
import axios from 'axios';
import { endpoints } from '../endpoints';
import qs from 'qs';

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

export function* editVolunteerWatcherSaga() {
  yield takeLatest('EDIT_VOLUNTEER_REQUEST', editVolunteerWorkerSaga);
}

function editVolunteer(action) {
  let id = action.id;
  let data = action.data;
  let requestData = {
    firstname: data.firstname,
    lastname: data.lastname,
    phone: data.phone,
    email: data.email,
    city: data.city,
    country: data.country,
    description: data.description
  };

  const config = {
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded'
    }
  };
  return axios.post(
    endpoints.editVolunteer(id),
    qs.stringify(requestData),
    config
  );
}

function* editVolunteerWorkerSaga(action) {
  try {
    const response = yield call(editVolunteer, action);
    const volunteer = response.data;
    yield put({ type: 'EDIT_VOLUNTEER_SUCCESS', volunteer });
  } catch (error) {
    yield put({ type: 'EDIT_VOLUNTEER_FAILURE', error });
  }
}

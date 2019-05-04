import { all } from 'redux-saga/effects';

import { watcherSaga, volunteerWatcherSaga } from './volunteersSagas';

export default function* rootSaga() {
  yield all([watcherSaga(), volunteerWatcherSaga()]);
}

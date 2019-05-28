import { all, fork } from 'redux-saga/effects';

import { watcherSaga, volunteerWatcherSaga } from './volunteersSagas';
import { eventWatcherSaga, eventsWatcherSaga } from './eventsSagas';
import {
  volunteerUserWatcherSaga,
  organisationUserWatcherSaga
} from './usersSagas';

export default function* rootSaga() {
  yield all([
    fork(watcherSaga),
    fork(volunteerWatcherSaga),
    fork(eventWatcherSaga),
    fork(eventsWatcherSaga),
    fork(volunteerUserWatcherSaga),
    fork(organisationUserWatcherSaga)
  ]);
}

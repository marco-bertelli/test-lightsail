#!/usr/bin/env sh
set -e

CMD="$@"
if [ $# -eq 0 ]
then
    CMD="bash"
fi

docker-compose exec php /bin/bash -ic "${CMD}"

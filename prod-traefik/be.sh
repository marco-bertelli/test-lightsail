#!/usr/bin/env sh
set -e

CMD="$@"
if [ $# -eq 0 ]
then
    CMD="bash"
fi

docker-compose exec web_container /bin/bash -ic "${CMD}"

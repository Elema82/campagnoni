<?php

namespace App\Listeners;

use Dingo\Api\Event\ResponseWasMorphed;

class SuccessAPIResponseListener
{
	/**
	 * Listener that manage the response for success
	 * @param ResponseWasMorphed $event
	 * @return boolean
	 */
	public function handle(ResponseWasMorphed $event)
	{
		if (!isset($event->response) || !$event->response instanceof \Dingo\Api\Http\Response) {
			return false;
		}

		$statusCode = $event->response->getStatusCode();

		if (!in_array($statusCode, [200, 201])) {
			return false;
		}

		if (!isset($event->content['data']['code'])) {
			$content = [
				'code' => $statusCode,
				'status' => ' success',
			];
		}
		else {
			$content = [
				'code' => $event->content['data']['code'],
				'status' => $event->content['data']['status'],
			];
		}

		if (isset($event->content['data'])) {
			$content['data'] = $event->content['data'];
		}
		else {
			$content['data'] = $event->content;
		}
		if (isset($event->content['meta']['pagination'])) {
			$content['meta'] = $event->content['meta']	;
            if (isset($content['paginator']['links'])) {
                unset($content['paginator']['links']);
            }
		}
		$event->content = $content;
	}

}

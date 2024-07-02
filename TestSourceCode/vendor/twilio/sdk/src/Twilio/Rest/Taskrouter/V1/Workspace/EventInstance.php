<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Taskrouter\V1\Workspace;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string $accountSid
 * @property string $actorSid
 * @property string $actorType
 * @property string $actorUrl
 * @property string $description
 * @property array $eventData
 * @property \DateTime $eventDate
 * @property string $eventDateMs
 * @property string $eventType
 * @property string $resourceSid
 * @property string $resourceType
 * @property string $resourceUrl
 * @property string $sid
 * @property string $source
 * @property string $sourceIpAddress
 * @property string $url
 * @property string $workspaceSid
 */
class EventInstance extends InstanceResource {
    /**
     * Initialize the EventInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $workspaceSid The SID of the Workspace that contains the Event
     * @param string $sid The SID of the resource to fetch
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\EventInstance
     */
    public function __construct(Version $version, array $payload, $workspaceSid, $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'actorSid' => Values::array_get($payload, 'actor_sid'),
            'actorType' => Values::array_get($payload, 'actor_type'),
            'actorUrl' => Values::array_get($payload, 'actor_url'),
            'description' => Values::array_get($payload, 'description'),
            'eventData' => Values::array_get($payload, 'event_data'),
            'eventDate' => Deserialize::dateTime(Values::array_get($payload, 'event_date')),
            'eventDateMs' => Values::array_get($payload, 'event_date_ms'),
            'eventType' => Values::array_get($payload, 'event_type'),
            'resourceSid' => Values::array_get($payload, 'resource_sid'),
            'resourceType' => Values::array_get($payload, 'resource_type'),
            'resourceUrl' => Values::array_get($payload, 'resource_url'),
            'sid' => Values::array_get($payload, 'sid'),
            'source' => Values::array_get($payload, 'source'),
            'sourceIpAddress' => Values::array_get($payload, 'source_ip_address'),
            'url' => Values::array_get($payload, 'url'),
            'workspaceSid' => Values::array_get($payload, 'workspace_sid'),
        );

        $this->solution = array('workspaceSid' => $workspaceSid, 'sid' => $sid ?: $this->properties['sid'], );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\EventContext Context for this
     *                                                           EventInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new EventContext(
                $this->version,
                $this->solution['workspaceSid'],
                $this->solution['sid']
            );
        }

        return $this->context;
    }

    /**
     * Fetch a EventInstance
     *
     * @return EventInstance Fetched EventInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get($name) {
        if (\array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }

        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown property: ' . $name);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Taskrouter.V1.EventInstance ' . \implode(' ', $context) . ']';
    }
}
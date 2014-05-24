===============================
Route REST requests for Extbase
===============================

Route HTTP/REST request to action on your controller based on the request method (e.g. GET, POST, PUT).


Usage
=====

Publish your Extbase controller actions as REST methods by adding a ``@restMethod`` phpDoc. E.g., ::

	* @restMethod GET

Call your actions using ``/_rest/`` segment::

	http://example.com/_rest/{extensionKey}.{pluginName}/{controllerName}.{format}
	http://example.com/_rest/{vendorName}.{extensionKey}.{pluginName}/{controllerName}.{format}

Example::

	http://example.com/_rest/my_extension.fancy_plugin/data.json

h2. YQL-Utilities


This widget contains files associated with the construction of a JavaScript widget for displaying data obtained from YQL.  This widget uses the following external utilities:
* <a href="http://developer.yahoo.com/yui/get" target="_blank">YUI GET</a> - Obtains data from public YQL URI (avoids same origin policy issue)

There are two files associated with the widget:

<b>yql_js_widget.js</b><br>
This is the JavaScript widget that captures the YQL data and parses the formatting defined by the user.  This file needs to be included where the YQL JS widget is to be displayed.

<b>yql_js_widget.html</b><br>
The HTML file displays sample methods for initializing and rendering a YQL widget.  See the following example:

<notextile>
<pre>
1.  &lt;script type="text/javascript" src="yql_js_widget.js"&gt;&lt;/script&gt;
2.  &lt;div id="widgetContainer"&gt;&lt;/div&gt;
3.  &lt;script type="text/javascript"&gt;
4.  var config = {'debug' : true};
5.  var format = '&lt;br style="clear:both" /&gt;{item.description}';
6.  var yqlQuery = 'select * from weather.forecast where location = 90210';
7.  var insertEl = 'widgetContainer';
8.  yqlWidget.push(yqlQuery, config, format, insertEl);
9.  yqlWidget.render();
10. &lt;/script&gt;
</pre>
</notextile>

Going through the above example, here is the definition for how to format the requests:

<b>Line 1</b><br />
Include the widget JavaScript file

<b>Line 2</b><br />
Create the container the you would like to drop the widget into (must have an id)

<b>Line 4</b><br />
<i>(OPTIONAL)</i> Define the config object. This object has the following available key / value pairs:
* debug (true / false) - If set to true, status messages will be displayed via console.log during widget rendering

<b>Line 5</b><br />
Define the format string.  This string will be what is inserted into the container defined on line 2 and will be added for each result returned by YQL and may contain HTML / CSS / JavaScript.  Any text that is added between curly brackets (e.g. {test}) will be re-rendered as the associated data returned by YQL.  For instance, if you go to the <a href="http://developer.yahoo.com/yql/console/?q=select%20*%20from%20weather.forecast%20where%20location%3D90210" target="_blank">YQL Console</a> and run the weather query, {item.description} will relate to the results at query->results->channel->item->description.

<b>Line 6</b><br />
Define the YQL query to pass to the public YQL URI. 

<b>Line 7</b><br />
Define the id of the container you wish to insert the widget into

<b>Line 8</b><br />
Push the widget on the stack.  If you have multiple widgets to be rendered, you would push each widget on the load stack using push before rendering (as seen on line 9).  The push function accepts the following parameters:
* YQL Query <i>(REQUIRED)</i> - The query defined on line 6
* Config <i>(OPTIONAL)</i> - The config object defined on line 4
* Format <i>(REQUIRED)</i> - The content to add for each result into the container defined
* Insert Element <i>(REQUIRED)</i> - The id of the container to insert the widget into

<b>Line 9</b><br />
Render all widgets pushed onto the load stack

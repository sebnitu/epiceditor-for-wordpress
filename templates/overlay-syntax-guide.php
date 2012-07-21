<div id="overlay-syntax-guide" class="overlay overlay-syntax-guide">
	<div class="inner-overlay">
	
	<div class="overlay-header">
		<div class="menu">
			<?php /* <a href="#" class="btn-popup" title="Open in new window">Popup Window</a> */ ?>
			<a href="#" class="btn-close" title="Close">Close</a>
		</div>
		<h1>Markdown Syntax</h1>
	</div>
	
	<div class="overlay-content">
		
		<?php /*
		<a href="#" class="toggle-content">Table of Contents</a>
		
		<div class="inner-content table-of-contents">
			<a href="#" class="toggle-content">Collapse</a>
			
			<h2>Table of Contents</h2>
			
			<ul>
				<li><a href="#blockElements">Block Elements</a>
					<ul>
						<li><a href="#paragraphs">Paragraphs and Line Breaks</a></li>
						<li><a href="#headers">Headers</a></li>
						<li><a href="#blockquotes">Blockquotes</a></li>
						<li><a href="#lists">Lists</a></li>
						<li><a href="#codeBlocks">Code Blocks</a></li>
						<li><a href="#horizRules">Horizontal Rules</a></li>
					</ul>
				</li>
				
				<li><a href="#spanElements">Span Elements</a>
					<ul>
						<li><a href="#links">Links</a></li>
						<li><a href="#emphasis">Emphasis</a></li>
						<li><a href="#code">Code</a></li>
						<li><a href="#images">Images</a></li>
					</ul>
				</li>
				
				<li><a href="#miscellaneous">Miscellaneous</a>
					<ul>
						<li><a href="#autoLinks">Automatic Links</a></li>
						<li><a href="#backslash">Backslash Escapes</a></li>
					</ul>
				</li>
				
				<li><a href="#about">About Markdown</a>
					<ul>
						<li><a href="#aboutMarkdown">Markdown</a></li>
						<li><a href="#aboutEpicEditor">EpicEditor</a></li>
						<li><a href="#aboutEpicEditorForWordPress">EpicEditor for WordPress</a></li>
					</ul>
				</li>
			</ul>
			
		</div>
		*/ ?>
		
		<div class="inner-content main-content">
		
			
			<h2 id="blockElements">Block Elements</h2>
			
			<div class="accordion">
			<h3 id="paragraphs">Paragraphs and Line Breaks</h3>
			<div class="accordion-content">
			<div class="accordion-inner">
				<p>A paragraph is simply one or more consecutive lines of text, separated by one or more blank lines. (A blank line is any line that looks like a blank line &mdash; a line containing nothing but spaces or tabs is considered blank.) Normal paragraphs should not be indented with spaces or tabs.</p>
				<p>When you do want to insert a <code>&lt;br /&gt;</code> break tag using Markdown, you end a line with two or more spaces, then type return.</p>
			</div>
			</div>
			</div>
			
			<div class="accordion">
			<h3 id="headers">Headers</h3>
			<div class="accordion-content">
			<div class="accordion-inner">
			<p>Markdown supports two styles of headers, <a href="http://docutils.sourceforge.net/mirror/setext.html" target="_blank">Setext</a> and <a href="http://www.aaronsw.com/2002/atx/" target="_blank">atx.</a></p>

			<p>Setext-style headers are &ldquo;underlined&rdquo; using equal signs (for first-level headers) and dashes (for second-level headers). For example:</p>
			
<pre><code>This is an H1
=============
This is an H2
-------------</code></pre>
			
			<p>Any number of underlining =&rsquo;s or -&rsquo;s will work.</p>

			<p>Atx-style headers use 1-6 hash characters at the start of the line, corresponding to header levels 1-6. For example:</p>

<pre><code># This is an H1
## This is an H2
###### This is an H6</code></pre>

			<p>Optionally, you may &ldquo;close&rdquo; atx-style headers. This is purely cosmetic &mdash; you can use this if you think it looks better. The closing hashes don&rsquo;t even need to match the number of hashes used to open the header:</p>
			
<pre><code># This is an H1 #
## This is an H2 ##
### This is an H3 ######</code></pre>

			<p>The number of opening hashes determines the header level.</p>
			
			</div>
			</div>
			</div>
			
			<div class="accordion">
			<h3 id="blockquotes">Blockquotes</h3>
			<div class="accordion-content">
			<div class="accordion-inner">
			<p>Markdown uses email-style &gt; characters for blockquoting. If you&rsquo;re familiar with quoting passages of text in an email message, then you know how to create a blockquote in Markdown. It looks best if you hard wrap the text and put a &gt; before every line:</p>
			
<pre><code>&gt; This is a blockquote with two paragraphs. Lorem ipsum dolor sit amet,
&gt; consectetuer adipiscing elit. Aliquam hendrerit mi posuere lectus.
&gt; Vestibulum enim wisi, viverra nec, fringilla in, laoreet vitae, risus.
&gt; 
&gt; Donec sit amet nisl. Aliquam semper ipsum sit amet velit. Suspendisse
&gt; id sem consectetuer libero luctus adipiscing.</code></pre>
			
			<p>Markdown allows you to be lazy and only put the &gt; before the first line of a hard-wrapped paragraph:</p>
			
<pre><code>&gt; This is a blockquote with two paragraphs. Lorem ipsum dolor sit amet,
consectetuer adipiscing elit. Aliquam hendrerit mi posuere lectus.
Vestibulum enim wisi, viverra nec, fringilla in, laoreet vitae, risus.

&gt; Donec sit amet nisl. Aliquam semper ipsum sit amet velit. Suspendisse
id sem consectetuer libero luctus adipiscing.</code></pre>
			
			<p>Blockquotes can be nested (i.e. a blockquote-in-a-blockquote) by adding additional levels of >:</p>
			
<pre><code>&gt; This is the first level of quoting.
&gt;
&gt; &gt; This is nested blockquote.
&gt;
&gt; Back to the first level.</code></pre>
			
			<p>Blockquotes can contain other Markdown elements, including headers, lists, and code blocks:</p>
			
<pre><code>&gt; ## This is a header.
&gt; 
&gt; 1.   This is the first list item.
&gt; 2.   This is the second list item.
&gt; 
&gt; Here's some example code:
&gt; 
&gt;     return shell_exec(&quot;echo $input | $markdown_script&quot;);</code></pre>
			
			<p>Any decent text editor should make email-style quoting easy. For example, with BBEdit, you can make a selection and choose Increase Quote Level from the Text menu.</p>
			</div>
			</div>
			</div>
			
			<div class="accordion">
			<h3 id="lists">Lists</h3>
			<div class="accordion-content">
			<div class="accordion-inner">
			<p>Markdown supports ordered (numbered) and unordered (bulleted) lists.</p>
			
			<p>Unordered lists use asterisks, pluses, and hyphens &mdash; interchangably &mdash; as list markers:</p>

<pre><code>*   Red
*   Green
*   Blue</code></pre>

			<p>is equivalent to:</p>

<pre><code>+   Red
+   Green
+   Blue</code></pre>

			<p>and:</p>

<pre><code>-   Red
-   Green
-   Blue</code></pre>

			<p>Ordered lists use numbers followed by periods:</p>

<pre><code>1.  Bird
2.  McHale
3.  Parish</code></pre>
			</div>
			</div>
			</div>
			
			<div class="accordion">
			<h3 id="codeBlocks">Code Blocks</h3>
			<div class="accordion-content">
			<div class="accordion-inner">
			<p>Pre-formatted code blocks are used for writing about programming or markup source code. Rather than forming normal paragraphs, the lines of a code block are interpreted literally. Markdown wraps a code block in both <code>&lt;pre&gt;</code> and <code>&lt;code&gt;</code> tags.</p>

			<p>To produce a code block in Markdown, simply indent every line of the block by at least 4 spaces or 1 tab. For example, given this input:</p>

<pre><code>This is a normal paragraph:

    This is a code block.</code></pre>
    
			<p>Markdown will generate:</p>

<pre><code>&lt;p&gt;This is a normal paragraph:&lt;/p&gt;

&lt;pre&gt;&lt;code&gt;This is a code block.&lt;/code&gt;&lt;/pre&gt;</code></pre>

			<p>You can also use three backtick quotes ( <code>```</code> ) to indicate a code block with another three at the end of the block. So you could write something like this:</p>

<pre><code>```
Your code goes here...
```</code></pre>

			<p>Read more about writing <a href="#code">inline code</a>.</p>
			</div>
			</div>
			</div>
			
			<div class="accordion">
			<h3 id="horizRules">Horizontal Rules</h3>
			<div class="accordion-content">
			<div class="accordion-inner">
			<p>You can produce a horizontal rule tag ( <code>&lt;hr /&gt;</code> ) by placing three or more hyphens, asterisks, or underscores on a line by themselves. If you wish, you may use spaces between the hyphens or asterisks. Each of the following lines will produce a horizontal rule:</p>

<pre><code>* * *

***

*****

- - -

---------------------------------------</code></pre>
			</div>
			</div>
			</div>
			
			
			<h2 id="spanElements">Span Elements</h2>
			
			<div class="accordion">
			<h3 id="links">Links</h3>
			<div class="accordion-content">
			<div class="accordion-inner">
			<p>Markdown supports two style of links: inline and reference.</p>
			
			<p>In both styles, the link text is delimited by [square brackets].</p>
			
			<p>To create an inline link, use a set of regular parentheses immediately after the link text&rsquo;s closing square bracket. Inside the parentheses, put the URL where you want the link to point, along with an optional title for the link, surrounded in quotes. For example:</p>

<pre><code>This is [an example](http://example.com/ &quot;Title&quot;) inline link.

[This link](http://example.net/) has no title attribute.</code></pre>

			<p>Will produce:</p>

<pre><code>&lt;p&gt;This is &lt;a href=&quot;http://example.com/&quot; title=&quot;Title&quot;&gt; an example&lt;/a&gt; inline link.&lt;/p&gt;

&lt;p&gt;&lt;a href=&quot;http://example.net/&quot;&gt;This link&lt;/a&gt; has no title attribute.&lt;/p&gt;</code></pre>

			<p>If you&rsquo;re referring to a local resource on the same server, you can use relative paths:</p>

<pre><code>See my [About](/about/) page for details.</code></pre>

			<p>Reference-style links use a second set of square brackets, inside which you place a label of your choosing to identify the link:</p>

<pre><code>This is [an example][id] reference-style link.</code></pre>

			<p>You can optionally use a space to separate the sets of brackets:</p>

<pre><code>This is [an example] [id] reference-style link.</code></pre>

			<p>Then, anywhere in the document, you define your link label like this, on a line by itself:</p>

<pre><code>[id]: http://example.com/  &quot;Optional Title Here&quot;</code></pre>

			<p>That is:</p>
			
			<ul>
				<li>Square brackets containing the link identifier (optionally indented from the left margin using up to three spaces);</li>
				<li>followed by a colon;</li>
				<li>followed by one or more spaces (or tabs);</li>
				<li>followed by the URL for the link;</li>
				<li>optionally followed by a title attribute for the link, enclosed in double or single quotes, or enclosed in parentheses.</li>
			</ul>		
			</div>
			</div>
			</div>
			
			<div class="accordion">
			<h3 id="emphasis">Emphasis</h3>
			<div class="accordion-content">
			<div class="accordion-inner">
			<p>Markdown treats asterisks (*) and underscores (_) as indicators of emphasis. Text wrapped with one * or _ will be wrapped with an HTML <code>&lt;em&gt;</code> tag; double *&rsquo;s or _&rsquo;s will be wrapped with an HTML <code>&lt;strong&gt;</code> tag. E.g., this input:</p>

<pre><code>*single asterisks*

_single underscores_

**double asterisks**

__double underscores__</code></pre>

			<p>will produce:</p>

<pre><code>&lt;em&gt;single asterisks&lt;/em&gt;

&lt;em&gt;single underscores&lt;/em&gt;

&lt;strong&gt;double asterisks&lt;/strong&gt;

&lt;strong&gt;double underscores&lt;/strong&gt;</code></pre>

			<p>You can use whichever style you prefer; the lone restriction is that the same character must be used to open and close an emphasis span.</p>
			</div>
			</div>
			</div>
			
			<div class="accordion">
			<h3 id="code">Code</h3>
			<div class="accordion-content">
			<div class="accordion-inner">
			<p>To indicate a span of code, wrap it with backtick quotes ( <code>`</code> ). Unlike a pre-formatted code block, a code span indicates code within a normal paragraph. For example:</p>

<pre><code>Use the `printf()` function.</code></pre>

			<p>will produce:</p>

<pre><code>&lt;p&gt;Use the &lt;code&gt;printf()&lt;/code&gt; function.&lt;/p&gt;</code></pre>

			<p>To include a literal backtick character within a code span, you can use multiple backticks as the opening and closing delimiters:</p>

<pre><code>``There is a literal backtick (`) here.``</code></pre>

			<p>which will produce this:</p>

<pre><code>&lt;p&gt;&lt;code&gt;There is a literal backtick (`) here.&lt;/code&gt;&lt;/p&gt;</code></pre>

			<p>The backtick delimiters surrounding a code span may include spaces &mdash; one after the opening, one before the closing. This allows you to place literal backtick characters at the beginning or end of a code span:</p>

<pre><code>A single backtick in a code span: `` ` ``
A backtick-delimited string in a code span: `` `foo` ``</code></pre>

			<p>will produce:</p>

<pre><code>&lt;p&gt;A single backtick in a code span: &lt;code&gt;`&lt;/code&gt;&lt;/p&gt;
&lt;p&gt;A backtick-delimited string in a code span: &lt;code&gt;`foo`&lt;/code&gt;&lt;/p&gt;</code></pre>

			<p>With a code span, ampersands and angle brackets are encoded as HTML entities automatically, which makes it easy to include example HTML tags. Markdown will turn this:</p>

<pre><code>Please don't use any `&lt;blink&gt;` tags.</code></pre>

			<p>into:</p>

<pre><code>&lt;p&gt;Please don't use any &lt;code&gt;&amp;lt;blink&amp;gt;&lt;/code&gt; tags.&lt;/p&gt;</code></pre>

			<p>You can write this:</p>

<pre><code>`&amp;#8212;` is the decimal-encoded equivalent of `&amp;mdash;`.</code></pre>

			<p>to produce:</p>

<pre><code>&lt;p&gt;&lt;code&gt;&amp;amp;#8212;&lt;/code&gt; is the decimal-encoded
equivalent of &lt;code&gt;&amp;amp;mdash;&lt;/code&gt;.&lt;/p&gt;</code></pre>
			</div>
			</div>
			</div>
			
			<div class="accordion">
			<h3 id="images">Images</h3>
			<div class="accordion-content">
			<div class="accordion-inner">
			<p>Admittedly, it&rsquo;s fairly difficult to devise a &ldquo;natural&rdquo; syntax for placing images into a plain text document format.</p>
			
			<p>Markdown uses an image syntax that is intended to resemble the syntax for links, allowing for two styles: inline and reference.</p>
			
			<p>Inline image syntax looks like this:</p>

<pre><code>![Alt text](/path/to/img.jpg)

![Alt text](/path/to/img.jpg &quot;Optional title&quot;)</code></pre>

			<p>That is:</p>
			<ul>
				<li>An exclamation mark: !;</li>
				<li>followed by a set of square brackets, containing the alt attribute text for the image;</li>
				<li>followed by a set of parentheses, containing the URL or path to the image, and an optional title attribute enclosed in double or single quotes.</li>
			</ul>

			<p>Reference-style image syntax looks like this:</p>

<pre><code>![Alt text][id]</code></pre>

			<p>Where &ldquo;id&rdquo; is the name of a defined image reference. Image references are defined using syntax identical to link references:</p>

<pre><code>[id]: url/to/image  &quot;Optional title attribute&quot;</code></pre>
			
			<p>As of this writing, Markdown has no syntax for specifying the dimensions of an image; if this is important to you, you can simply use regular HTML &lt;img&gt; tags.</p>
			</div>
			</div>
			</div>
			
			
			<h2 id="miscellaneous">Miscellaneous</h2>
			
			<div class="accordion">
			<h3 id="autoLinks">Automatic Links</h3>
			<div class="accordion-content">
			<div class="accordion-inner">
			<p>Markdown supports a shortcut style for creating &ldquo;automatic&rdquo; links for URLs and email addresses: simply surround the URL or email address with angle brackets. What this means is that if you want to show the actual text of a URL or email address, and also have it be a clickable link, you can do this:</p>

<pre><code>&lt;http://example.com/&gt;</code></pre>

			<p>Markdown will turn this into:</p>

<pre><code>&lt;a href=&quot;http://example.com/&quot;&gt;http://example.com/&lt;/a&gt;</code></pre>

			<p>Automatic links for email addresses work similarly, except that Markdown will also perform a bit of randomized decimal and hex entity-encoding to help obscure your address from address-harvesting spambots. For example, Markdown will turn this:</p>

<pre><code>&lt;address@example.com&gt;</code></pre>

			<p>into something like this:</p>

<pre><code>&lt;a href="&#x6D;&#x61;i&#x6C;&#x74;&#x6F;:&#x61;&#x64;&#x64;&#x72;&#x65;
&#115;&#115;&#64;&#101;&#120;&#x61;&#109;&#x70;&#x6C;e&#x2E;&#99;&#111;
&#109;">&#x61;&#x64;&#x64;&#x72;&#x65;&#115;&#115;&#64;&#101;&#120;&#x61;
&#109;&#x70;&#x6C;e&#x2E;&#99;&#111;&#109;&lt;/a&gt;</code></pre>

			<p>which will render in a browser as a clickable link to &ldquo;address@example.com&rdquo;.

			<p>(This sort of entity-encoding trick will indeed fool many, if not most, address-harvesting bots, but it definitely won&rsquo;t fool all of them. It&rsquo;s better than nothing, but an address published in this way will probably eventually start receiving spam.)</p>
			</div>
			</div>
			</div>
			
			<div class="accordion">
			<h3 id="backslash">Backslash Escapes</h3>
			<div class="accordion-content">
			<div class="accordion-inner">
			<p>Markdown allows you to use backslash escapes to generate literal characters which would otherwise have special meaning in Markdown&rsquo;s formatting syntax. For example, if you wanted to surround a word with literal asterisks (instead of an HTML &lt;em&gt; tag), you can use backslashes before the asterisks, like this:</p>

<pre><code>\*literal asterisks\*</code></pre>

			<p>Markdown provides backslash escapes for the following characters:</p>

<pre><code>\   backslash
`   backtick
*   asterisk
_   underscore
{}  curly braces
[]  square brackets
()  parentheses
#   hash mark
+   plus sign
-   minus sign (hyphen)
.   dot
!   exclamation mark</code></pre>
			</div>
			</div>
			</div>
			
			<hr />
			
			<h2 id="about">About</h2>
			
			<div class="accordion">
			<h3 id="aboutMarkdown">Markdown</h3>
			<div class="accordion-content">
			<div class="accordion-inner">
			<p><a href="http://daringfireball.net/projects/markdown/" target="_blank">Markdown</a> is a text-to-HTML conversion tool for web writers. Markdown allows you to write using an easy-to-read, easy-to-write plain text format, then convert it to structurally valid XHTML (or HTML).</p>
			
			<p>Markdown was created by <a href="http://daringfireball.net/" target="_blank">John Gruber</a>. You can <a href="http://daringfireball.net/projects/markdown/" target="_blank">read more about it</a> or his <a href="http://daringfireball.net/projects/markdown/syntax" target="_blank">full documentation</a> on the syntax &mdash; where the above documentation was originally pulled from. All credit for Markdown and these documentations goes to him.</p>
			</div>
			</div>
			</div>
			
			<div class="accordion">
			<h3 id="aboutEpicEditor">EpicEditor</h3>
			<div class="accordion-content">
			<div class="accordion-inner">
			<p><a href="http://epiceditor.com/" target="_blank">EpicEditor</a> is an embeddable JavaScript <a href="http://daringfireball.net/projects/markdown/" target="_blank">Markdown</a> editor with split fullscreen editing, live previewing, automatic draft saving, offline support, and more. For developers, it offers a robust API, can be easily themed, and allows you to swap out the bundled Markdown parser with anything you throw at it.</p>
			
			<p>EpicEditor relies on <a href="https://github.com/chjj/marked" target="_blank">Marked</a> to parse markdown and is brought to you in part by <a href="http://twitter.com/oscargodson" target="_blank">Oscar Godson</a> and <a href="http://twitter.com/johnmdonahue" target="_blank">John Donahue</a>. Special thanks to <a href="http://twitter.com/adam_bickford" target="_blank">Adam Bickford</a> for the bug fixes and being the QA for pull requests. Lastly, huge thanks to <a href="http://twitter.com/sebnitu" target="_blank">Sebastian Nitu</a> for the amazing logo and doc styles.</p>
			</div>
			</div>
			</div>
			
			<div class="accordion">
			<h3 id="aboutEpicEditorForWordPress">EpicEditor for WordPress</h3>
			<div class="accordion-content">
			<div class="accordion-inner">
			<p><a href="#" target="_blank">EpicEditor for WordPress</a> is a WordPress plugin that let's you run the EpicEditor text editor in your WordPress site. It's written and maintained by <a href="http://sebnitu.com" target="_blank">Sebastian Nitu</a>.</p>
			<p>Find any bugs? Want to give your feedback? <a href="mailto:me@sebnitu.com" target="_blank">Get in touch with me</a>, I'd love to hear from you.</p>
			</div>
			</div>
			</div>
			
			
		</div>
		
	</div>
	
	<div class="overlay-footer">
		<a href="#" class="overlay-resize"></a>
	</div>
	
	</div>
</div>
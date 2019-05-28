<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\VarDumper\Caster;

use Symfony\Component\VarDumper\Cloner\Stub;

/**
 * Casts DOM related classes to array representation.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
class DOMCaster
{
<<<<<<< HEAD
    private static $errorCodes = array(
=======
    private static $errorCodes = [
>>>>>>> dev
        DOM_PHP_ERR => 'DOM_PHP_ERR',
        DOM_INDEX_SIZE_ERR => 'DOM_INDEX_SIZE_ERR',
        DOMSTRING_SIZE_ERR => 'DOMSTRING_SIZE_ERR',
        DOM_HIERARCHY_REQUEST_ERR => 'DOM_HIERARCHY_REQUEST_ERR',
        DOM_WRONG_DOCUMENT_ERR => 'DOM_WRONG_DOCUMENT_ERR',
        DOM_INVALID_CHARACTER_ERR => 'DOM_INVALID_CHARACTER_ERR',
        DOM_NO_DATA_ALLOWED_ERR => 'DOM_NO_DATA_ALLOWED_ERR',
        DOM_NO_MODIFICATION_ALLOWED_ERR => 'DOM_NO_MODIFICATION_ALLOWED_ERR',
        DOM_NOT_FOUND_ERR => 'DOM_NOT_FOUND_ERR',
        DOM_NOT_SUPPORTED_ERR => 'DOM_NOT_SUPPORTED_ERR',
        DOM_INUSE_ATTRIBUTE_ERR => 'DOM_INUSE_ATTRIBUTE_ERR',
        DOM_INVALID_STATE_ERR => 'DOM_INVALID_STATE_ERR',
        DOM_SYNTAX_ERR => 'DOM_SYNTAX_ERR',
        DOM_INVALID_MODIFICATION_ERR => 'DOM_INVALID_MODIFICATION_ERR',
        DOM_NAMESPACE_ERR => 'DOM_NAMESPACE_ERR',
        DOM_INVALID_ACCESS_ERR => 'DOM_INVALID_ACCESS_ERR',
        DOM_VALIDATION_ERR => 'DOM_VALIDATION_ERR',
<<<<<<< HEAD
    );

    private static $nodeTypes = array(
=======
    ];

    private static $nodeTypes = [
>>>>>>> dev
        XML_ELEMENT_NODE => 'XML_ELEMENT_NODE',
        XML_ATTRIBUTE_NODE => 'XML_ATTRIBUTE_NODE',
        XML_TEXT_NODE => 'XML_TEXT_NODE',
        XML_CDATA_SECTION_NODE => 'XML_CDATA_SECTION_NODE',
        XML_ENTITY_REF_NODE => 'XML_ENTITY_REF_NODE',
        XML_ENTITY_NODE => 'XML_ENTITY_NODE',
        XML_PI_NODE => 'XML_PI_NODE',
        XML_COMMENT_NODE => 'XML_COMMENT_NODE',
        XML_DOCUMENT_NODE => 'XML_DOCUMENT_NODE',
        XML_DOCUMENT_TYPE_NODE => 'XML_DOCUMENT_TYPE_NODE',
        XML_DOCUMENT_FRAG_NODE => 'XML_DOCUMENT_FRAG_NODE',
        XML_NOTATION_NODE => 'XML_NOTATION_NODE',
        XML_HTML_DOCUMENT_NODE => 'XML_HTML_DOCUMENT_NODE',
        XML_DTD_NODE => 'XML_DTD_NODE',
        XML_ELEMENT_DECL_NODE => 'XML_ELEMENT_DECL_NODE',
        XML_ATTRIBUTE_DECL_NODE => 'XML_ATTRIBUTE_DECL_NODE',
        XML_ENTITY_DECL_NODE => 'XML_ENTITY_DECL_NODE',
        XML_NAMESPACE_DECL_NODE => 'XML_NAMESPACE_DECL_NODE',
<<<<<<< HEAD
    );
=======
    ];
>>>>>>> dev

    public static function castException(\DOMException $e, array $a, Stub $stub, $isNested)
    {
        $k = Caster::PREFIX_PROTECTED.'code';
        if (isset($a[$k], self::$errorCodes[$a[$k]])) {
            $a[$k] = new ConstStub(self::$errorCodes[$a[$k]], $a[$k]);
        }

        return $a;
    }

    public static function castLength($dom, array $a, Stub $stub, $isNested)
    {
<<<<<<< HEAD
        $a += array(
            'length' => $dom->length,
        );
=======
        $a += [
            'length' => $dom->length,
        ];
>>>>>>> dev

        return $a;
    }

    public static function castImplementation($dom, array $a, Stub $stub, $isNested)
    {
<<<<<<< HEAD
        $a += array(
            Caster::PREFIX_VIRTUAL.'Core' => '1.0',
            Caster::PREFIX_VIRTUAL.'XML' => '2.0',
        );
=======
        $a += [
            Caster::PREFIX_VIRTUAL.'Core' => '1.0',
            Caster::PREFIX_VIRTUAL.'XML' => '2.0',
        ];
>>>>>>> dev

        return $a;
    }

    public static function castNode(\DOMNode $dom, array $a, Stub $stub, $isNested)
    {
<<<<<<< HEAD
        $a += array(
=======
        $a += [
>>>>>>> dev
            'nodeName' => $dom->nodeName,
            'nodeValue' => new CutStub($dom->nodeValue),
            'nodeType' => new ConstStub(self::$nodeTypes[$dom->nodeType], $dom->nodeType),
            'parentNode' => new CutStub($dom->parentNode),
            'childNodes' => $dom->childNodes,
            'firstChild' => new CutStub($dom->firstChild),
            'lastChild' => new CutStub($dom->lastChild),
            'previousSibling' => new CutStub($dom->previousSibling),
            'nextSibling' => new CutStub($dom->nextSibling),
            'attributes' => $dom->attributes,
            'ownerDocument' => new CutStub($dom->ownerDocument),
            'namespaceURI' => $dom->namespaceURI,
            'prefix' => $dom->prefix,
            'localName' => $dom->localName,
<<<<<<< HEAD
            'baseURI' => $dom->baseURI,
            'textContent' => new CutStub($dom->textContent),
        );
=======
            'baseURI' => $dom->baseURI ? new LinkStub($dom->baseURI) : $dom->baseURI,
            'textContent' => new CutStub($dom->textContent),
        ];
>>>>>>> dev

        return $a;
    }

    public static function castNameSpaceNode(\DOMNameSpaceNode $dom, array $a, Stub $stub, $isNested)
    {
<<<<<<< HEAD
        $a += array(
=======
        $a += [
>>>>>>> dev
            'nodeName' => $dom->nodeName,
            'nodeValue' => new CutStub($dom->nodeValue),
            'nodeType' => new ConstStub(self::$nodeTypes[$dom->nodeType], $dom->nodeType),
            'prefix' => $dom->prefix,
            'localName' => $dom->localName,
            'namespaceURI' => $dom->namespaceURI,
            'ownerDocument' => new CutStub($dom->ownerDocument),
            'parentNode' => new CutStub($dom->parentNode),
<<<<<<< HEAD
        );
=======
        ];
>>>>>>> dev

        return $a;
    }

    public static function castDocument(\DOMDocument $dom, array $a, Stub $stub, $isNested, $filter = 0)
    {
<<<<<<< HEAD
        $a += array(
=======
        $a += [
>>>>>>> dev
            'doctype' => $dom->doctype,
            'implementation' => $dom->implementation,
            'documentElement' => new CutStub($dom->documentElement),
            'actualEncoding' => $dom->actualEncoding,
            'encoding' => $dom->encoding,
            'xmlEncoding' => $dom->xmlEncoding,
            'standalone' => $dom->standalone,
            'xmlStandalone' => $dom->xmlStandalone,
            'version' => $dom->version,
            'xmlVersion' => $dom->xmlVersion,
            'strictErrorChecking' => $dom->strictErrorChecking,
<<<<<<< HEAD
            'documentURI' => $dom->documentURI,
=======
            'documentURI' => $dom->documentURI ? new LinkStub($dom->documentURI) : $dom->documentURI,
>>>>>>> dev
            'config' => $dom->config,
            'formatOutput' => $dom->formatOutput,
            'validateOnParse' => $dom->validateOnParse,
            'resolveExternals' => $dom->resolveExternals,
            'preserveWhiteSpace' => $dom->preserveWhiteSpace,
            'recover' => $dom->recover,
            'substituteEntities' => $dom->substituteEntities,
<<<<<<< HEAD
        );
=======
        ];
>>>>>>> dev

        if (!($filter & Caster::EXCLUDE_VERBOSE)) {
            $formatOutput = $dom->formatOutput;
            $dom->formatOutput = true;
<<<<<<< HEAD
            $a += array(Caster::PREFIX_VIRTUAL.'xml' => $dom->saveXML());
=======
            $a += [Caster::PREFIX_VIRTUAL.'xml' => $dom->saveXML()];
>>>>>>> dev
            $dom->formatOutput = $formatOutput;
        }

        return $a;
    }

    public static function castCharacterData(\DOMCharacterData $dom, array $a, Stub $stub, $isNested)
    {
<<<<<<< HEAD
        $a += array(
            'data' => $dom->data,
            'length' => $dom->length,
        );
=======
        $a += [
            'data' => $dom->data,
            'length' => $dom->length,
        ];
>>>>>>> dev

        return $a;
    }

    public static function castAttr(\DOMAttr $dom, array $a, Stub $stub, $isNested)
    {
<<<<<<< HEAD
        $a += array(
=======
        $a += [
>>>>>>> dev
            'name' => $dom->name,
            'specified' => $dom->specified,
            'value' => $dom->value,
            'ownerElement' => $dom->ownerElement,
            'schemaTypeInfo' => $dom->schemaTypeInfo,
<<<<<<< HEAD
        );
=======
        ];
>>>>>>> dev

        return $a;
    }

    public static function castElement(\DOMElement $dom, array $a, Stub $stub, $isNested)
    {
<<<<<<< HEAD
        $a += array(
            'tagName' => $dom->tagName,
            'schemaTypeInfo' => $dom->schemaTypeInfo,
        );
=======
        $a += [
            'tagName' => $dom->tagName,
            'schemaTypeInfo' => $dom->schemaTypeInfo,
        ];
>>>>>>> dev

        return $a;
    }

    public static function castText(\DOMText $dom, array $a, Stub $stub, $isNested)
    {
<<<<<<< HEAD
        $a += array(
            'wholeText' => $dom->wholeText,
        );
=======
        $a += [
            'wholeText' => $dom->wholeText,
        ];
>>>>>>> dev

        return $a;
    }

    public static function castTypeinfo(\DOMTypeinfo $dom, array $a, Stub $stub, $isNested)
    {
<<<<<<< HEAD
        $a += array(
            'typeName' => $dom->typeName,
            'typeNamespace' => $dom->typeNamespace,
        );
=======
        $a += [
            'typeName' => $dom->typeName,
            'typeNamespace' => $dom->typeNamespace,
        ];
>>>>>>> dev

        return $a;
    }

    public static function castDomError(\DOMDomError $dom, array $a, Stub $stub, $isNested)
    {
<<<<<<< HEAD
        $a += array(
=======
        $a += [
>>>>>>> dev
            'severity' => $dom->severity,
            'message' => $dom->message,
            'type' => $dom->type,
            'relatedException' => $dom->relatedException,
            'related_data' => $dom->related_data,
            'location' => $dom->location,
<<<<<<< HEAD
        );
=======
        ];
>>>>>>> dev

        return $a;
    }

    public static function castLocator(\DOMLocator $dom, array $a, Stub $stub, $isNested)
    {
<<<<<<< HEAD
        $a += array(
=======
        $a += [
>>>>>>> dev
            'lineNumber' => $dom->lineNumber,
            'columnNumber' => $dom->columnNumber,
            'offset' => $dom->offset,
            'relatedNode' => $dom->relatedNode,
<<<<<<< HEAD
            'uri' => $dom->uri,
        );
=======
            'uri' => $dom->uri ? new LinkStub($dom->uri, $dom->lineNumber) : $dom->uri,
        ];
>>>>>>> dev

        return $a;
    }

    public static function castDocumentType(\DOMDocumentType $dom, array $a, Stub $stub, $isNested)
    {
<<<<<<< HEAD
        $a += array(
=======
        $a += [
>>>>>>> dev
            'name' => $dom->name,
            'entities' => $dom->entities,
            'notations' => $dom->notations,
            'publicId' => $dom->publicId,
            'systemId' => $dom->systemId,
            'internalSubset' => $dom->internalSubset,
<<<<<<< HEAD
        );
=======
        ];
>>>>>>> dev

        return $a;
    }

    public static function castNotation(\DOMNotation $dom, array $a, Stub $stub, $isNested)
    {
<<<<<<< HEAD
        $a += array(
            'publicId' => $dom->publicId,
            'systemId' => $dom->systemId,
        );
=======
        $a += [
            'publicId' => $dom->publicId,
            'systemId' => $dom->systemId,
        ];
>>>>>>> dev

        return $a;
    }

    public static function castEntity(\DOMEntity $dom, array $a, Stub $stub, $isNested)
    {
<<<<<<< HEAD
        $a += array(
=======
        $a += [
>>>>>>> dev
            'publicId' => $dom->publicId,
            'systemId' => $dom->systemId,
            'notationName' => $dom->notationName,
            'actualEncoding' => $dom->actualEncoding,
            'encoding' => $dom->encoding,
            'version' => $dom->version,
<<<<<<< HEAD
        );
=======
        ];
>>>>>>> dev

        return $a;
    }

    public static function castProcessingInstruction(\DOMProcessingInstruction $dom, array $a, Stub $stub, $isNested)
    {
<<<<<<< HEAD
        $a += array(
            'target' => $dom->target,
            'data' => $dom->data,
        );
=======
        $a += [
            'target' => $dom->target,
            'data' => $dom->data,
        ];
>>>>>>> dev

        return $a;
    }

    public static function castXPath(\DOMXPath $dom, array $a, Stub $stub, $isNested)
    {
<<<<<<< HEAD
        $a += array(
            'document' => $dom->document,
        );
=======
        $a += [
            'document' => $dom->document,
        ];
>>>>>>> dev

        return $a;
    }
}

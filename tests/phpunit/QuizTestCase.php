<?php

namespace MediaWiki\Extension\Quiz\Tests;

use MediaWiki\MainConfigNames;
use MediaWiki\Parser\Parser;
use MediaWiki\Parser\ParserOptions;
use MediaWiki\SpecialPage\SpecialPage;
use MediaWikiLangTestCase;

abstract class QuizTestCase extends MediaWikiLangTestCase {
	/** @var Parser */
	protected Parser $parser;

	protected function setUp(): void {
		parent::setUp();

		$this->overrideConfigValue( MainConfigNames::UsePigLatinVariant, false );

		$options = new ParserOptions( $this->getTestUser()->getUser() );
		$title = SpecialPage::getTitleFor( 'Blankpage', '/dummy by Quiz' );
		$this->parser = $this->getServiceContainer()->getParser();
		$this->parser->startExternalParse( $title, $options, Parser::OT_PLAIN, true );
	}
}

<?php

/*
 * This file is part of the Kreta package.
 *
 * (c) Beñat Espiña <benatespina@gmail.com>
 * (c) Gorka Laucirica <gorka.lauzirika@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Spec\Kreta\PhpCsFixerConfig;

use Kreta\PhpCsFixerConfig\KretaConfig;
use PhpSpec\ObjectBehavior;

class KretaConfigSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(KretaConfig::class);
    }

    function it_gets_rules_array()
    {
        $this->getRules()->shouldBeArray();
    }

    function it_gets_required_visibility_rule_when_is_phpspec_configuration()
    {
        $this->beConstructedWith(true);
        $this->getRules()->shouldBeArray();
        $this->getRules()->shouldHaveKeyWithValue('visibility_required', false);
    }
}

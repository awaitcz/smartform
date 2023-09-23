<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Email\Validate;

enum ValidateEmailResultFlag: string
{

	// Doručená pošta je plná, takže e-maily nelze doručit
	case FullInbox = 'FULL_INBOX';

	// Špatná syntaxe e-mailové adresy
	case BadSyntax = 'BAD_SYNTAX';

	// Nesprávná nebo neexistující doména
	case BadDomain = 'BAD_DOMAIN';

	// Uživatel (místní část e-mailové adresy) neexistuje na poštovním serveru
	case MailboxNotFound = 'MAILBOX_NOT_FOUND';

	// Doména přijímá všechny e-maily. Nelze určit, jestli zadaná schránka existuje.
	case AcceptAllPolicy = 'ACCEPT_ALL_POLICY';

	// Dočasná chyba, e-mailová adresa může být znovu ověřena později
	case Temporary = 'TEMPORARY';

}

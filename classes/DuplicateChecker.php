<?php
require_once __DIR__ . '/Email.php';

class DuplicateChecker
{
  /** @var string[] */
  private const DUPLI_CONTENT = [];

  /**
   * Checks if given email is a spam
   *
   * @param Email $email Email to verify
   * @return boolean true if email is spam, false otherwise
   * @throws InvalidArgumentException if email format is incorrect
   */
  public function isDuplicate(Email $email): bool
  {
    return in_array($email->getDomain(), self::DUPLI_CONTENT);
  }
}

<?php
/**
 * Class creating and populating information for an author.
 *
 * @author Wyatt Salmons <wyattsalmons@gmail.com>
 */

class Author {
	/**
	 * the id for this author, this is the primary key
	 */
	private $authorId;
	/**
	 * the author Url
	 */
	private $authorAvatarUrl;
	/**
	 * the author activation token
	 */
	private $authorActivationToken;
	/**
	 *the author email address
	 */
	private $authorEmail;
	/**
	 * the author hash
	 */
	private $authorHash;
	/**
	 * the author username
	 */
	private $authorUsername;

	/**
	 * accessor method for authorId
	 *
	 * @return int value of profile id
	 */
	public function getAuthorId() {
		return($this->authorId);
	}

	/**
	 * mutator method for authorId
	 *
	 * @param int $newAuthorId new value of author id
	 * @throws UnexpectedValueException if $newAuthorId is not an integer
	 */
	public function setProfileId ($newAuthorId) {
		// verify the author id is valid
		$newAuthorId = filter_var($newAuthorId, FILTER_VALIDATE_INT);
		if($newAuthorId === false) {
			throw(new UnexpectedValueException("author id is not a valid integer"));
		}

		// convert and store the author id
		$this->authorId = intval($newAuthorId);
	}
}
?>


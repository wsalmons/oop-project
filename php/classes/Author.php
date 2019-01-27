<?php
namespace Deepdivedylan\DataDesign;

require_once("autoload.php");
require_once(dirname(__DIR__, 2) . "/vendor/autoload.php");

use Ramsey\Uuid\Uuid;
/**
 * Class creating and populating information for an author.
 *
 * @author Wyatt Salmons <wyattsalmons@gmail.com>
 */

class author implements \JsonSerializable {
	use ValidateDate;
	use ValidateUuid;

	/**
	 * the id for this author, this is the primary key
	 * @var Uuid $authorId
	 */
	private $authorId;

	/**
	 * the author activation token
	 * @var string activation token
	 */
	private $authorActivationToken;

	/**
	 * the author url
	 * @var string $authorAvatarUrl
	 */
	private $authorAvatarUrl;

	/**
	 *the author email address
	 * @var string $authorEmail
	 */
	private $authorEmail;

	/**
	 * the author hash
	 * @var string $authorHash
	 */
	private $authorHash;

	/**
	 * the author username
	 * @var string $authorUsername
	 */
	private $authorUsername;


	/**
	 * constructor for author object
	 *
	 * @param string|Uuid $newAuthorId of this new author
	 * @param string containing $newAuthorActivationToken
	 * @param string containing $newAuthorAvatarUrl
	 * @param string containing $newAuthorEmail
	 * @param string containing $newAuthorHash
	 * @param string containing $newAuthorUsername
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (eg, strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 * @documentation https://php.net/manual/en/language.oop5.decon.php
	 */
	public function __construct($newAuthorId, $newAuthorActivationToken, $newAuthorAvatarUrl, $newAuthorEmail, $newAuthorHash, $newAuthorUsername) {
		try {
			$this->setAuthorId($newAuthorId);
			$this->setAuthorActivationToken($newAuthorActivationToken);
			$this->setauthorAvatarUrl($newAuthorAvatarUrl);
			$this->setauthorEmail($newAuthorEmail);
			$this->setAuthorHash($newAuthorHash);
			$this->setAuthorUsername($newAuthorUsername);
		}
		//determine what exception was thrown
		catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
}

	/**
	 * accessor method for authorId
	 *
	 * @return Uuid value of author id
	 */
	public function getAuthorId() : Uuid {
		return($this->authorId);
	}

	/**
	 * mutator method for authorId
	 *
	 * @param Uuid | string $newAuthorId new value of author id
	 * @throws \RangeException if $newAuthorId is not positive
	 * @throws \TypeError if $newAuthorId id not a uuid or string
	 */
	public function setAuthorId($newAuthorId) : void {
		try {
			$uuid = self::validateUuid($newAuthorId);
		}
		catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw (new $exceptionType($exception->getMessage(), 0, $exception));
		}
		// convert and store the author id
		$this->authorId = $uuid;
	}

	/**
	 * accessor method for author activation token
	 *
	 * @return string value of author activation token
	 */
	public function getAuthorActivationToken() : string {
		return($this->authorActivationToken);
	}

	/**
	 * mutator method for author activation token
	 *
	 * @param string $newAuthorActivationToken new value of author activation token
	 * @throws \InvalidArgumentException if $newAuthorActivationToken is not a string or insecure
	 * @throws \RangeException if $newAuthorActivationToken is > 32 characters
	 * @throws \TypeError if $newAuthorActivationToken is not a string
	 */
	public function setAuthorActivationToken(string $newAuthorActivationToken) : void {
		// verify Author Activation Token is secure
		$newAuthorActivationToken = trim($newAuthorActivationToken);
		$newAuthorActivationToken = filter_var($newAuthorActivationToken, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newAuthorActivationToken) === true) {
			throw(new \InvalidArgumentException("author activation token is empty or insecure"));
		}
		//verify the content will fit into the database
		if(strlen($newAuthorActivationToken) > 32) {
			throw(new \RangeException("token content too large"));
		}
		// convert and store the author activation token
		$this->authorActivationToken = $newAuthorActivationToken;
	}

	/**
	 *accessor method for author avatar url
	 *
	 * @return string value of profile id
	 */
	public function getAuthorAvatarUrl() : string {
		return($this->authorAvatarUrl);
	}

	/**
	 * mutator method for author avatar url
	 *
	 * @param string $newAuthorAvatarUrl new value of author avatar url
	 * @throws \InvalidArgumentException if $newAvatarUrl is not a string or insecure
	 * @throws \RangeException if $newAvatarUrl is > 255 characters
	 * @throws \TypeError if $newTweetContent is not a string
	 */
	public function setAuthorAvatarUrl(string $newAuthorAvatarUrl) : void {
		// verify author avatar url is secure
		$newAuthorAvatarUrl = trim($newAuthorAvatarUrl);
		$newAuthorAvatarUrl = filter_var($newAuthorAvatarUrl, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newAuthorAvatarUrl) === true) {
			throw(new \InvalidArgumentException("author avatar url content is not secure"));
		}
		//verify the content will fit into the database
		if(strlen($newAuthorAvatarUrl) > 255) {
			throw(new \RangeException("url content too large"));
		}
		// convert and store the author avatar url
		$this->authorAvatarUrl = $newAuthorAvatarUrl;
	}

	/**
	 * accessor method for author email
	 *
	 * @return string value of author email
	 */
	public function getAuthorEmail() : string {
		return($this->authorEmail);
	}

	/**
	 * mutator method for author email
	 *
	 * @param string $newAuthorEmail new value of author email
	 * @throws \InvalidArgumentException if $newAuthorEmail is not a string or insecure
	 * @throws \RangeException if $newAuthorEmail is > 128 characters
	 * @throws \TypeError if $newAuthorEmail is not a string
	 */
	public function setAuthorEmail(string $newAuthorEmail) : void {
		//verify Author Email is secure
		$newAuthorEmail = trim($newAuthorEmail);
		$newAuthorEmail = filter_var($newAuthorEmail, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if (empty($newAuthorEmail) === true) {
			throw(new \InvalidArgumentException("author email is empty or insecure "));
		}
		//verify thw author email will fit in the database
		if(strlen($newAuthorEmail) > 128) {
			throw(new \RangeException("email content too large"));
		}
		// convert and store the author email
		$this->authorEmail = $newAuthorEmail;
	}

	/**
	 * accessor for author hash
	 *
	 * @return string value of author hash
	 */
	public function getAuthorHash() : string {
		return($this->authorHash);
	}

	/**
	 * mutator for  author hash
	 *
	 * @param string $newAuthorHash new value of Author Hash
	 * @throws \InvalidArgumentException if $newAuthorHash is not a string or insecure
	 * @throws \RangeException if $newAuthorHash is > 97 characters
	 * @throws \TypeError if $newAuthorHash is not a string
	 */
	public function setAuthorHash(string $newAuthorHash) : void {
		//verify author hash is valid
		$newAuthorHash = trim($newAuthorHash);
		$newAuthorHash = filter_var($newAuthorHash, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newAuthorHash) === true) {
			throw(new \InvalidArgumentException("author hash is empty or insecure"));
		}
		// verify the author hash content will fit in the database
		if(strlen($newAuthorHash) > 97) {
			throw(new \RangeException("hash content too large"));
		}
		// convert and store the author hash
		$this->authorHash = $newAuthorHash;
	}

	/**
	 * accessor for author username
	 *
	 * @return string value of
	 */

	public function getAuthorUsername() : string {
		return($this->authorUsername);
	}

	/**
	 * mutator for author username
	 *
	 * @param string $newAuthorUsername new value of author username
	 * @throws \InvalidArgumentException if $newAuthorUsername is not a string or insecure
	 * @throws \RangeException if $newAuthorUsername is > 32 characters
	 * @throws \TypeError if $newAuthorUsername is not a string
	 */
	public function setAuthorUsername(string $newAuthorUsername) : void {
		// verify author username
		$newAuthorUsername = trim($newAuthorUsername);
		$newAuthorUsername = filter_var($newAuthorUsername, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newAuthorUsername) === true) {
			throw(new \InvalidArgumentException("author username is empty or insecure"));
		}
		// verify the author username will fit in the database
		if(strlen($newAuthorUsername) > 32) {
			throw(new \RangeException("username content too large"));
		}
		// convert and store the author username
		$this->authorUsername = $newAuthorUsername;
	}
}
?>
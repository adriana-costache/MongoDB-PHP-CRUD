<?php

/**
 * User: sohail.alam
 * Date: 1/4/14
 * Time: 1:03 PM
 *
 * All you need to do is include this class in your PHP code and instantiate a new
 * instance of it, in order to do method calls
 *
 * For Example:
 * <code>
 *
 * include_once "../MongoCrud.php";
 * $mongoCrud = new MongoCrud("test", 'test_col');
 *
 * </code>
 */
class MongoCrud
{
    var $connection;
    var $database;
    var $collection;

    /**
     * Create a new instance of MongoCrud
     *
     * @param $dbName : The name of the database - This is a mandatory parameter
     * @param null|string $collection : The name of the collection - This is optional parameter
     * @param string $dbHost : The hostname of the MongoDB server - This is optional parameter (defaults to localhost)
     * @param int $dbPort : The port of the MongoDB server - This is optional parameter (defaults to 27017)
     */
    public function __construct($dbName, $collection = "", $dbHost = "localhost", $dbPort = 27017)
    {
        try {
            // open connection to MongoDB server
            $this->connection = new MongoClient("mongodb://" . $dbHost . ":" . $dbPort);
            // Select the database
            $this->database = $this->connection->selectDB($dbName);
            // If the collection name is passed in the constructor, then initialize it
            // else, you have initialize it manually later
            if ($collection != null && isset($collection)) {
                $this->setMongoCollection($collection);
            }
        } catch (MongoException $e) {
            die($this->sendErrorResponse(503, 'Failed to Create MongoDB Connection\r\n' . $e->getMessage()));
        }
    }

    /**
     * If the collection name was not set in the constructor,
     * then you must initialize it manually here using this method.
     *
     * You can also use this method to change your currently set collection to a
     * new one.
     *
     * @param $collection : The name of the MongoDB Collection
     */
    public function setMongoCollection($collection)
    {
        $this->collection = $collection;
    }

    /**
     * Insert a new document into MongoDB database and returns the _id of the newly created document
     *
     * <code>
     *
     * $data = array(
     *  'name' => 'Adri',
     *  'note' => 'this is testing'
     * );
     * $id = $mongoCrud->insert($data);
     *
     * </code>
     *
     * @param $document : The object that you need to store in MongoDB - This is a mandatory parameter
     * @param array $options : This is optional parameter
     * @return $_id : The unique id for the newly created document
     */
    public function insert($document, array $options = array())
    {
        try {
            $this->database
                ->selectCollection($this->collection)
                ->insert($document, $options); // insert a new document
            return $document['_id']; // Return the _id of the newly created document
        } catch (MongoException $e) {
            return $this->sendErrorResponse('Failed to Insert Data into MongoDB Collection ' . $this->collection . '\r\n' . $e->getMessage());
        }
    }

    /**
     * @param $query
     * @return array|null
     */
    public function findOne($query)
    {
        try {
            $doc = $this->database
                ->selectCollection($this->collection)
                ->findOne($query);
            return $doc;
        } catch (MongoException $e) {
            return $this->sendErrorResponse('Failed to Insert Data into MongoDB Collection ' . $this->collection . '\r\n' . $e->getMessage());
        }
    }

    /**
     * @param $query
     * @param $fieldsToRetrieve
     * @return MongoCursor
     */
    public function find($query, $fieldsToRetrieve = array())
    {
        try {
            $cursor = $this->database
                ->selectCollection($this->collection)
                ->find($query, $fieldsToRetrieve);;
            return $cursor;
        } catch (MongoException $e) {
            return $this->sendErrorResponse('Failed to Insert Data into MongoDB Collection ' . $this->collection . '\r\n' . $e->getMessage());
        }
    }

    /**
     * This method will update an existing document
     *
     * @param $document : The existing but updated document
     * @return array|bool
     */
    public function save($document)
    {
        try {
            return $this->database
                ->selectCollection($this->collection)
                ->save($document);
        } catch (MongoException $e) {
            return $this->sendErrorResponse('Failed to Insert Data into MongoDB Collection ' . $this->collection . '\r\n' . $e->getMessage());
        }
    }

    /**
     * Update records based on a given criteria
     *
     * @param array $query
     * @param array $newDocument
     * @param array $options
     * @return bool
     */
    public function update(array $query, array $newDocument, array $options = array())
    {
        try {
            return $this->database
                ->selectCollection($this->collection)
                ->update($query, $newDocument, $options);
        } catch (MongoException $e) {
            return $this->sendErrorResponse('Failed to Insert Data into MongoDB Collection ' . $this->collection . '\r\n' . $e->getMessage());
        }
    }


    /**
     * This is a helper method that will delete a document based on the given criteria
     *
     *
     * Example:
     * <code>
     *
     * $query = array(
     *   'name' => 'Adri',
     * );
     *
     * $removed = $mongoCrud->remove($query);
     * echo 'Data Removed - Affected : ' . $removed['n'] . ' document(s).';
     *
     * </code>
     *
     * @param $query : The criteria to identify which document to delete
     * @param array $options : The various options to set, by default 'safe' => true
     * @return mixed
     */
    public function remove($query, $options = array('safe' => true))
    {
        try {
            $r = $this->database
                ->selectCollection($this->collection)
                ->remove($query, $options); // remove a document
            return $r;
        } catch (MongoException $e) {
            return $this->sendErrorResponse('Failed to Delete Data from MongoDB Collection ' . $this->collection . '\r\n' . $e->getMessage());
        }
    }

    private function sendErrorResponse($code = 500, $message)
    {
        http_response_code($code);
        return $message;
    }

} 
